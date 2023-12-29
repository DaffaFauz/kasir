<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
   <div class="row">
    <div class="col text-primary d-flex justify-content-center">
        <i class="fa fa-shopping-cart fa-3x"></i>
        <h1><?= $profile['nama_toko'] ?></h1>
    </div>
   </div>

   <div class="row">
    <div class="col text-center">
        <h5 class="text-primary"><?= $profile['slogan'] ?></h5>
        <strong>
            <?= $profile['alamat'] ?><br>
            <?= $profile['no_telpon'] ?>
        </strong>
    </div>
   </div>

   <div class="row mt-5">
    <div class="col text-center">
        <h5><?= $laporan ?></h5>
    </div>
   </div>

   <div class="row mt-1">
    <div class="col">
        <?php if($page){
            echo view($page);
        } ?>
    </div>
   </div>

<script src="<?= base_url() ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
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
<script>
    window.addEventListener('load', print())
</script>
</body>
</html>