<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Kasir | Penjualan</title>
  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select.less">
  <link rel="stylesheet" href="<?= base_url() ?>assets/scss/style.css">
  <link href="<?= base_url() ?>assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
</head>

<body>
  <div id="right-panel" class="right-panel">
    <header id="header" class="header">

      <div class="header-menu">

        <div class="col-sm-7">

        </div>

        <div class="col-sm-5">
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
              <?php if (session()->get('level') == 1) { ?>
                <a class="nav-link" href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a>

                <a class="nav-link" href="/setting"><i class="fa fa-cog"></i> Settings</a>

                <a class="nav-link" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
              <?php } else { ?>
                <a class="nav-link" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
              <?php } ?>
            </div>
          </div>

        </div>
      </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Transaksi Penjualan</h1>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <?php if (session()->get('level') == 1) { ?>
                <li><a href="/dashboard">Dashboard</a></li>
                <li class="active">Transaksi Penjualan</li>
              <?php } else { ?>
                <li>Dashboard</li>
                <li class="active">Transaksi Penjualan</li>
              <?php } ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-7">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <label for="no_faktur">No Faktur</label>
                  <label for="no_faktur" class="form-control text-danger"><?= $items ?></label>
                </div>
                <div class="col">
                  <label for="tgl">Tanggal</label>
                  <label for="tgl" class="form-control"><?= date('d M Y') ?></label>
                </div>
                <div class="col">
                  <label for="jam">Jam</label>
                  <label for="jam" class="form-control" id="jam"></label>
                </div>
                <div class="col">
                  <label for="kasir">Kasir</label>
                  <label for="" class="form-control text-primary"><?= session()->get('nama') ?></label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
            </div>
            <div class="card-body bg-dark">
              <h1 class="text-success text-right">Rp. <?= number_format($grand_total) ?>,-</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <form action="/penjualan/addcart" method="post">
                  <div class="col-3">
                    <div class="input-group">
                      <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Barcode/Kode Produk">
                      <button type="button" class="btn btn-primary input-group-append" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search"></i>
                        <button type="reset" class="btn btn-danger input-group-append"><i class="fa fa-times"></i>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group">
                      <input type="text" class="form-control" readonly name="nama_produk" placeholder="Nama Produk">
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="input-group">
                      <input type="text" class="form-control" readonly name="kategori" placeholder="Kategori">
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="input-group">
                      <input type="text" class="form-control" readonly name="satuan" placeholder="Satuan">
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="input-group">
                      <input type="text" class="form-control" readonly name="harga" placeholder="Harga">
                    </div>
                  </div>
                  <input type="hidden" name="modal">
                  <div class="col-1">
                    <div class="input-group">
                      <input type="number" class="form-control text-center" name="qty" placeholder="QTY">
                    </div>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-primary"><i class="fa fa-shopping-cart"> Add</i></button>
                    <a href="penjualan/delete" class="btn btn-warning"><i class="fa fa-refresh"> Clear</i></a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-credit-card"> Pembayaran</i></button>
                  </div>
                </form>
              </div>
              <hr>
              <div class="row">
                <div class="col">
                  <table class="table">
                    <thead>
                      <tr class="text-center">
                        <th>Kode/Barcode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Jual</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($cart as $c) : ?>
                        <tr>
                          <td><?= $c['id'] ?></td>
                          <td><?= $c['name'] ?></td>
                          <td><?= $c['options']['nama_kategori'] ?></td>
                          <td class="text-right">Rp. <?= number_format($c['price']) ?>,-</td>
                          <td class="text-center"><?= $c['qty'] ?> <?= $c['options']['nama_satuan'] ?></td>
                          <td class="text-right">Rp. <?= number_format($c['subtotal']) ?>,-</td>
                          <td><a href="penjualan/remove/<?= $c['rowid'] ?>" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body bg-dark">
              <h1 class="text-warning text-center" id="terbilang"></h1>
            </div>
          </div>
        </div>
      </div>
    </div><!-- .animated -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cari Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
            <?= csrf_field() ?>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($produk as $p) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $p['kode_produk'] ?></td>
                      <td><?= $p['nama_produk'] ?></td>
                      <td><?= $p['stok'] ?></td>
                      <td>
                        <button type="button" onclick="cariProduk(<?= $p['kode_produk'] ?>)" class="btn btn-success" data-dismiss="modal">Pilih</button>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cari Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="/penjualan/simpanTransaksi" method="post">
            <?= csrf_field() ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="total" class=" form-control-label">Total Pembayaran</label>
                <div class="input-group">
                  <div class="input-group-addon">Rp.</div>
                  <input type="text" id="total" class="form-control" name="total" value="<?= number_format($grand_total) ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="bayar" class=" form-control-label">Dibayar</label>
                <div class="input-group">
                  <div class="input-group-addon">Rp.</div>
                  <input type="text" id="bayar" class="form-control" name="bayar" placeholder="Masukkan Nominal">
                </div>
              </div>
              <div class="form-group">
                <label for="kembalian" class=" form-control-label">Kembalian</label>
                <div class="input-group">
                  <div class="input-group-addon">Rp.</div>
                  <input type="text" id="kembalian" class="form-control" name="kembalian" readonly>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="Submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Transaksi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
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
    <?php } ?>
  </div>

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
  <script src="<?= base_url() ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins.js"></script>
  <script src="<?= base_url() ?>assets/js/main.js"></script>
  <script src="<?= base_url() ?>assets/js/lib/terbilang/terbilang.js"></script>
  <script src="assets/js/lib/autoNumeric/src/AutoNumeric.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
      $('#kode_produk').focus();
      $('#kode_produk').keydown(function(e) {
        kode_produk = $('#kode_produk').val();
        if (e.keyCode == 13) {
          e.preventDefault();
          if (kode_produk == '') {
            Swal.fire({
              text: "Input tidak boleh kosong!"
            })
          } else {
            cekKode();
          }
        }
      })

      function cekKode() {
        $.ajax({
          type: "post",
          url: "<?= base_url('penjualan/cek') ?>",
          data: {
            kode_produk: $('#kode_produk').val()
          },
          dataType: "JSON",
          success: function(response) {
            if (response.nama_produk == '') {
              Swal.fire({
                text: "Data tidak terdaftar!"
              })
            } else {
              $('[name="nama_produk"]').val(response.nama_produk),
                $('[name="kategori"]').val(response.nama_kategori),
                $('[name="satuan"]').val(response.nama_satuan),
                $('[name="harga"]').val(response.harga_jual),
                $('[name="modal"]').val(response.harga_beli),
                $('[name="qty"]').focus()
            }
          }
        })
      }
    });

    <?php if ($grand_total == 0) { ?>
      document.querySelector('#terbilang').innerHTML = 'Nol Rupiah'
    <?php } else { ?>
      document.querySelector('#terbilang').innerHTML = terbilang(<?= $grand_total ?>) + ' Rupiah'
    <?php } ?>

    new AutoNumeric('#bayar', {
      digitGroupSeparator: ',',
      decimalPlaces: 0
    });
    $('#bayar').keyup(function() {
      kembalian();
    })

    function kembalian() {
      let total = $('#total').val().replace(/[^.\d]/g, '').toString()
      let bayar = $('#bayar').val().replace(/[^.\d]/g, '').toString()
      let kembalian = parseFloat(bayar) - parseFloat(total)
      $('#kembalian').val(kembalian)

      new AutoNumeric('#kembalian', {
        digitGroupSeparator: ',',
        decimalPlaces: 0
      });
    }

    window.onload = function() {
      jam()
    }

    function jam() {
      var e = document.getElementById('jam');
      var d = new Date();
      var h = set(d.getHours())
      var m = set(d.getMinutes())
      var s = set(d.getSeconds())
      e.innerHTML = h + ':' + m + ':' + s
      var t = setTimeout(function() {
        jam()
      }, 1000)
    }

    function set(d) {
      (d < 10) ? d = '0' + d: d = d;
      return d;
    }
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
  <script>
    function cariProduk(kodeProduk) {
      $('#kode_produk').val(kodeProduk);
    }
  </script>
</body>

</html>