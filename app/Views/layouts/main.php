<!DOCTYPE html>
<html <?= esc($title) == 'login' ? "class='h-100'": ""?> lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>3 universe - <?= $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/favicon.png')?>">
    <!-- Pignose Calender -->
    <?php if (esc($title) == 'login') : ?>
        <link href="<?= base_url('css/style.css')?>" rel="stylesheet">
    <?php else: ?>
        <link href="<?= base_url('plugins/pg-calendar/css/pignose.calendar.min.css')?>" rel="stylesheet">
        <!-- Chartist -->
        <link rel="stylesheet" href="<?= base_url('plugins/chartist/css/chartist.min.css')?>">
        <link rel="stylesheet" href="<?= base_url('plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')?>">
        <link href="<?= base_url('css/style.css')?>" rel="stylesheet">
        <link href="<?= base_url('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <?php endif; ?>
    <!-- Custom Stylesheet -->

</head>

<body <?= esc($title) == 'login' ? "class='h-100'": ""?> >

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <?= $this->renderSection('content') ?>

    <?php if (esc($title) == 'login') : ?>
        <script src="<?= base_url('plugins/common/common.min.js')?>"></script>
        <script src="<?= base_url('js/custom.min.js')?>"></script>
        <script src="<?= base_url('js/settings.js')?>"></script>
        <script src="<?= base_url('js/gleek.js')?>"></script>
        <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>

    <?php elseif(esc($title) == 'addMahasiswa' || esc($title) == 'editMahasiswa'): ?>
        <script src="<?= base_url('plugins/common/common.min.js')?>"></script>
        <script src="<?= base_url('js/custom.min.js')?>"></script>
        <script src="<?= base_url('js/settings.js')?>"></script>
        <script src="<?= base_url('js/gleek.js')?>"></script>
        <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>

        <script src="<?= base_url('plugins/validation/jquery.validate.min.js') ?>"></script>
        <script src="<?= base_url('plugins/validation/jquery.validate-mahasiswa.js') ?>"></script>

    <?php elseif(esc($title) == 'dataMahasiswa'): ?>
        <script src="<?= base_url('plugins/common/common.min.js')?>"></script>
        <script src="<?= base_url('js/custom.min.js')?>"></script>
        <script src="<?= base_url('js/settings.js')?>"></script>
        <script src="<?= base_url('js/gleek.js')?>"></script>
        <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>

        <script src="<?= base_url('plugins/tables/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') ?>"></script>
        <script src="<?= base_url('plugins/tables/js/datatable-init/datatable-basic.min.js') ?>"></script>

    <?php else: ?>
        <script src="<?= base_url('plugins/common/common.min.js')?>"></script>
        <script src="<?= base_url('js/custom.min.js')?>"></script>
        <script src="<?= base_url('js/settings.js')?>"></script>
        <script src="<?= base_url('js/gleek.js')?>"></script>
        <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>
        <!-- Chartjs -->
        <script src="<?= base_url('plugins/chart.js/Chart.bundle.min.js') ?>"></script>
        <!-- Circle progress -->
        <script src="<?= base_url('plugins/circle-progress/circle-progress.min.js')?>"></script>
        <!-- Datamap -->
        <script src="<?= base_url('plugins/d3v3/index.js') ?>"></script>
        <script src="<?= base_url('plugins/topojson/topojson.min.js') ?>"></script>

        <script src=" <?= base_url('plugins/datamaps/datamaps.world.min.js')?>"></script>
        <!-- Morrisjs -->
        <script src=" <?= base_url('plugins/raphael/raphael.min.js')?>"></script>
        <script src=" <?= base_url('plugins/morris/morris.min.js')?>"></script>
        <!-- Pignose Calender -->
        <script src=" <?= base_url('plugins/moment/moment.min.js')?>"></script>
        <script src=" <?= base_url('plugins/pg-calendar/js/pignose.calendar.min.js')?>"></script>
        <!-- ChartistJS -->
        <script src=" <?= base_url('plugins/chartist/js/chartist.min.js')?>"></script>
        <script src=" <?= base_url('plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')?>"></script>

        <script src=" <?= base_url('js/dashboard/dashboard-1.js')?>"></script>
    <?php endif; ?>


</body>

</html>