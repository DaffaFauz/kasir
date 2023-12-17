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

if(session()->getFlashData('error')){
  ?>
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    <span class="badge badge-pill badge-danger">Failed</span>
    <?= session()->getFlashdata('error') ?>

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
          <strong class="card-title">Data Produk</strong>
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
                <th>Kode / Barcode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
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
                  <td><?= $item['kode_produk'] ?>
                  <td><?= $item['nama_produk'] ?>
                  <td><?= $item['nama_kategori'] ?></td>
                  <td><?= $item['nama_satuan'] ?></td>
                  <td>Rp. <?= number_format($item['harga_beli']) ?></td>
                  <td>Rp. <?= number_format($item['harga_jual']) ?></td>
                  <td><?= $item['stok'] ?></td>
                  <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $item['id_produk'] ?>"><i class="fa fa-edit"></i>
                    </button>
                    <form action="/produk/<?= $item['id_produk'] ?>" method="post" class="d-inline form">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="delete">
                      <button type="button" class="btn btn-danger" onclick="hapus(<?= $item['id_produk'] ?>)"><i class="fa fa-trash"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/produk/tambah" method="post">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="kode_produk" class=" form-control-label">Kode Produk</label>
            <input type="text" id="kode_produk" placeholder="Masukkan kode produk" class="form-control <?= (session('validation.kode_produk'))? 'is-invalid' : '' ?>" value="<?= old('kode_produk') ?>" name="kode_produk" >
            <div class="invalid-feedback">
              <?= session('validation.kode_produk') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_produk" class=" form-control-label">Nama Produk</label>
            <input type="text" id="nama_produk" placeholder="Masukkan nama produk" class="form-control <?= (session('validation.nama_produk'))? 'is-invalid' : '' ?>" value="<?= old('nama_produk') ?>" name="nama_produk" >
            <div class="invalid-feedback">
              <?= session('validation.nama_produk') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="id_kategori" class=" form-control-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control <?= (session('validation.id_kategori'))? 'is-invalid' : '' ?>">
              <option selected disabled>--Pilih Kategori--</option>
              <?php foreach($kategori as $k): ?>
              <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
              <?php endforeach ?>
            </select>
            <div class="invalid-feedback">
              <?= session('validation.id_kategori') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="id_satuan" class=" form-control-label">Satuan</label>
            <select name="id_satuan" id="id_satuan" class="form-control <?= (session('validation.id_satuan'))? 'is-invalid' : '' ?>">
              <option selected disabled>--Pilih Satuan--</option>
              <?php foreach($satuan as $s): ?>
              <option value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
              <?php endforeach ?>
            </select>
            <div class="invalid-feedback">
              <?= session('validation.id_satuan') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="harga_beli" class=" form-control-label">Harga Beli</label>
            <div class="input-group">
            <div class="input-group-addon">Rp.</div>
            <input type="text" id="harga_beli" placeholder="Masukkan harga beli" class="form-control <?= (session('validation.harga_beli'))? 'is-invalid' : '' ?>" value="<?= old('harga_beli') ?>" name="harga_beli" >
            <div class="invalid-feedback">
              <?= session('validation.harga_beli') ?>
            </div>
            </div>
          </div>
          <div class="form-group">
            <label for="harga_jual" class=" form-control-label">Harga Jual</label>
            <div class="input-group">
              <div class="input-group-addon">Rp.</div>
            <input type="text" id="harga_jual" placeholder="Masukkan harga jual" class="form-control <?= (session('validation.harga_jual'))? 'is-invalid' : '' ?>" value="<?= old('harga_jual') ?>" name="harga_jual" >
            <div class="invalid-feedback">
              <?= session('validation.harga_jual') ?>
            </div>
            </div>
          </div>
          <div class="form-group">
            <label for="stok" class=" form-control-label">Stok</label>
            <input type="text" id="stok" placeholder="Masukkan stok barang" class="form-control <?= (session('validation.stok'))? 'is-invalid' : '' ?>" value="<?= old('stok') ?>" name="stok" >
            <div class="invalid-feedback">
              <?= session('validation.stok') ?>
            </div>
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
  <div class="modal fade" id="exampleModal<?= $item['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/produk/ubah/<?= $item['id_produk'] ?>" method="post">
          <?= csrf_field() ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="kode_produk" class=" form-control-label">Kode Produk</label>
              <input type="text" id="kode_produk" placeholder="Masukkan kode produk" class="form-control" name="kode_produk" value="<?= (old('kode_produk'))? old('kode_produk'): $item['kode_produk'] ?>" >
            </div>
            <div class="form-group">
              <label for="nama_produk" class=" form-control-label">Nama Produk</label>
              <input type="text" id="nama_produk" placeholder="Masukkan nama produk" class="form-control" name="nama_produk" value="<?=(old('nama_produk'))? old('nama_produk') : $item['nama_produk'] ?>" >
            </div>
            <div class="form-group">
              <label for="id_kategori" class=" form-control-label">Kategori</label>
              <select name="id_kategori" id="id_kategori" class="form-control">
                <option selected disabled>--Pilih Kategori--</option>
                <?php foreach($kategori as $k): ?>
                <option value="<?= $item['id_kategori'] ?>" <?= ($item['id_kategori'] == $k['id_kategori'])? 'selected': '' ?>><?= $k['nama_kategori'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id_satuan" class=" form-control-label">Satuan</label>
              <select name="id_satuan" id="id_satuan" class="form-control">
                <option selected disabled>--Pilih Satuan--</option>
                <?php foreach($satuan as $s): ?>
                <option value="<?= $s['id_satuan'] ?>" <?= ($item['id_satuan'] == $s['id_satuan'])? 'selected': '' ?>><?= $s['nama_satuan'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
            <label for="harga_beli" class=" form-control-label">Harga Beli</label>
            <div class="input-group">
            <div class="input-group-addon">Rp.</div>
            <input type="text" id="harga_beli<?= $item['id_produk']?>" placeholder="Masukkan harga beli" class="form-control" name="harga_beli" value="<?= (old('harga_beli'))? old('harga_beli') : $item['harga_beli'] ?>" >
            </div>
          </div>
          <div class="form-group">
            <label for="harga_jual" class=" form-control-label">Harga Jual</label>
            <div class="input-group">
              <div class="input-group-addon">Rp.</div>
            <input type="text" id="harga_jual<?= $item['id_produk']?>" placeholder="Masukkan harga jual" class="form-control" name="harga_jual" value="<?= (old('harga_jual'))? old('harga_jual') : $item['harga_jual'] ?>" >
            </div>
          </div>
            <div class="form-group">
              <label for="stok" class=" form-control-label">Stok</label>
              <input type="text" id="stok" placeholder="Masukkan stok barang" class="form-control" name="stok" value="<?= (old('stok'))? old('stok') : $item['stok'] ?>" >
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
<script src="assets/js/lib/autoNumeric/src/AutoNumeric.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
  });

  new AutoNumeric('#harga_beli', { 
    digitGroupSeparator : ',',
    decimalPlaces: 0
  });
  new AutoNumeric('#harga_jual', { 
    digitGroupSeparator : ',', 
    decimalPlaces: 0
    });

    <?php foreach($items as $item): ?>
  new AutoNumeric('#harga_beli<?= $item['id_produk']?>', { 
    digitGroupSeparator : ',',
    decimalPlaces: 0
  });
  new AutoNumeric('#harga_jual<?= $item['id_produk']?>', { 
    digitGroupSeparator : ',', 
    decimalPlaces: 0
    });
    <?php endforeach ?>
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