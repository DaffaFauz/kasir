<?= $this->extend('layout/v_template') ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="animated fadeIn">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <strong class="card-title">Laporan Harian</strong>
          <div class="button">
            <!-- Button trigger modal -->
            <button type="button" onclick="getData()" class="btn btn-primary"><i class="fa fa-file"></i>
              Lihat Laporan
            </button>
            <button type="button" onclick="printLaporan()" class="btn btn-warning"><i class="fa fa-print"></i>
              Print Laporan
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group form-inline">
            <label for="" class="form-control-label pr-2">Tanggal:</label>
            <input type="date" name="tgl" id="tgl" class="form-control">
          </div>
          <table class="table table-striped table-bordered">
          </table>
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->
<?= $this->endSection() ?>



<?= $this->section('js') ?>
<script src="<?= base_url() ?>assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function getData() {
    let tgl = $('#tgl').val();
    if (tgl == '') {
      Swal.fire({
        text: "Tanggal Tidak Boleh Kosong!",
      })
    } else {
      $.ajax({
        type: 'post',
        url: '<?= base_url('laporan/harian/data') ?>',
        data: {
          tgl: tgl
        },
        dataType: 'JSON',
        success: function(response) {
          if (response.data) {
            $('.table').html(response.data)
          }
        }
      })
    }
  }

  function printLaporan() {
    let tgl = $('#tgl').val();
    if (tgl == '') {
      Swal.fire({
        text: "Tanggal Tidak Boleh Kosong!",
      })
    } else {
      newWin = window.open('/laporan/harian/' + tgl, 'newWin', 'toolbar=no, width=1000, height=500')
    }
  }
</script>
<?= $this->endSection() ?>