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
          <strong class="card-title">Data Satuan</strong>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
            Tambah Data
          </button>
        </div>
        <div class="card-body">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr class="text-center">
                <th width="50">No</th>
                <th>Satuan</th>
                <th width="75">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($items as $item) :
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $item['nama_satuan'] ?>
                  </td>
                  <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $item['id_satuan'] ?>"><i class="fa fa-edit"></i>
                    </button>
                    <form action="/satuan/<?= $item['id_satuan'] ?>" method="post" class="d-inline form">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="delete">
                      <button type="button" class="btn btn-danger" onclick="hapus(<?= $item['id_satuan'] ?>)"><i class="fa fa-trash"></i></a>
                    </form>
                  </td>
                </tr>
              <?php
              endforeach
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->

<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Satuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/satuan/tambah" method="post">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_satuan" class=" form-control-label">Nama Satuan</label>
            <input type="text" id="nama_satuan" placeholder="Masukkan nama satuan" class="form-control" name="nama_satuan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah -->
<?php
foreach ($items as $item) :
?>
  <div class="modal fade" id="exampleModal<?= $item['id_satuan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Satuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/satuan/ubah/<?= $item['id_satuan'] ?>" method="post">
          <?= csrf_field() ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_satuan" class=" form-control-label">Nama Satuan</label>
              <input type="text" id="nama_satuan" placeholder="Masukkan nama satuan" class="form-control" name="nama_satuan" value="<?= $item['nama_satuan'] ?>" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="Submit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php
endforeach
?>
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