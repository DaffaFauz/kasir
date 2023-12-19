<?= $this->extend('layout/v_template') ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?php
if (session()->getFlashdata('pesan')) {
?>
  <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
    <span class="badge badge-pill badge-primary">Success</span>
    <?= session()->getFlashdata('pesan') ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php
}
?>
<div class="animated fadeIn">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <strong class="card-title">Data Kategori</strong>
        </div>
        <div class="card-body">
        <form action="/setting/ubah/<?= $items['id'] ?>" method="post">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_toko" class=" form-control-label">Nama Toko</label>
            <input type="text" id="nama_toko" class="form-control" value="<?= $items['nama_toko'] ?>" name="nama_toko" required>
          </div>
          <div class="form-group">
            <label for="slogan" class=" form-control-label">Slogan</label>
            <input type="text" id="slogan" class="form-control" value="<?= $items['slogan'] ?>" name="slogan" required>
          </div>
          <div class="form-group">
            <label for="alamat" class=" form-control-label">Alamat</label>
            <input type="text" id="alamat" class="form-control" value="<?= $items['alamat'] ?>" name="alamat" required>
          </div>
          <div class="form-group">
            <label for="no_telpon" class=" form-control-label">No. Telpon</label>
            <input type="text" id="no_telpon" class="form-control" value="<?= $items['no_telpon'] ?>" name="no_telpon" required>
          </div>
          <div class="form-group">
            <label for="deskripsi" class=" form-control-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"><?= $items['deskripsi'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <button type="Submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->
<?= $this->endSection() ?>



<?= $this->section('js') ?>
<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function hapus($id) {
    var form = $('.form')
    Swal.fire({
      title: "Apakah Anda Yakin?",
      text: "Data yang Anda pilih akan dihapus!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Hapus!",
      cancelButtonText: "Batal"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Berhasil!",
          text: "Data berhasil dihapus",
          icon: "success",
          timer: 1500,
          showConfirmButton: false
        });
        form.submit();
      }
    });
  }
</script>
<?= $this->endSection() ?>