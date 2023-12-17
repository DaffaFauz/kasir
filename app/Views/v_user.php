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
          <strong class="card-title">Data User</strong>
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
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
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
                  <td><?= $item['nama_user'] ?>
                  <td><?= $item['email'] ?>
                  <td class="text-center"><?php if($item['level'] == 1){?>
                        <span class="badge badge-pill badge-success">Admin</span>
                        <?php }else{
                          ?>
                          <span class="badge badge-pill badge-primary">Kasir</span>

                      <?php
                  } ?>
                  </td>
                  <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $item['id_user'] ?>"><i class="fa fa-edit"></i>
                    </button>
                    <form action="/user/<?= $item['id_user'] ?>" method="post" class="d-inline form">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="delete">
                      <button type="button" class="btn btn-danger" onclick="hapus(<?= $item['id_user'] ?>)"><i class="fa fa-trash"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/user/tambah" method="post">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_user" class=" form-control-label">Nama user</label>
            <input type="text" id="nama_user" placeholder="Masukkan nama user" class="form-control" name="nama_user" required>
          </div>
          <div class="form-group">
            <label for="nama_user" class=" form-control-label">Email</label>
            <input type="text" id="nama_user" placeholder="Masukkan email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label for="nama_user" class=" form-control-label">Password</label>
            <input type="password" id="nama_user" placeholder="Masukkan password" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <label for="nama_user" class=" form-control-label">Level</label>
            <select name="level" id="" class="form-control">
              <option selected disabled>-- Level --</option>
              <option value="1">Admin</option>
              <option value="2">Kasir</option>
            </select>
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
  <div class="modal fade" id="exampleModal<?= $item['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/user/ubah/<?= $item['id_user'] ?>" method="post">
          <?= csrf_field() ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_user" class=" form-control-label">Nama user</label>
              <input type="text" id="nama_user" placeholder="Masukkan nama user" class="form-control" name="nama_user" value="<?= $item['nama_user'] ?>" required>
            </div>
            <div class="form-group">
              <label for="nama_user" class=" form-control-label">Email</label>
              <input type="text" id="nama_user" placeholder="Masukkan email" class="form-control" name="email" value="<?= $item['email'] ?>" required>
            </div>
            <div class="form-group">
              <label for="nama_user" class=" form-control-label">Level</label>
              <select name="level" id="" class="form-control">
              <option disabled>-- Level --</option>
              <option value="1" <?= ($item['level'] == 1)? 'selected' : '' ?>>Admin</option>
              <option value="2" <?= ($item['level'] == 2)? 'selected' : '' ?>>Kasir</option>
            </select>
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