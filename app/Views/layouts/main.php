<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>3 universe | <?= $title ?></title>

    <?php if (esc($title) == 'admin') : ?>
        <!-- Bootstrap -->
        <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?= base_url('vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="<?= base_url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?= base_url('vendors/jqvmap/dist/jqvmap.min.css') ?>" rel="stylesheet" />
        <!-- bootstrap-daterangepicker -->
        <link href="<?= base_url('vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
    <?php elseif (esc($title) == 'dataMahasiswa' || esc($title) == 'dataDosen' || esc($title) == 'dataJurusan' || esc($title) == 'dataMatakuliah') : ?>
        <!-- Bootstrap -->
        <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?= base_url('vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
        <!-- Datatables -->
        <link href="<?= base_url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?> " rel="stylesheet">
        <link href="<?= base_url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?> " rel="stylesheet">
        <link href="<?= base_url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?> " rel="stylesheet">
        <link href="<?= base_url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?> " rel="stylesheet">
        <link href="<?= base_url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?> " rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
    <?php elseif (esc($title) == 'addMahasiswa' || esc($title) == 'editMahasiswa') : ?>
        <!-- Bootstrap -->
        <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
        <script src="<?= base_url('js/jquery-3.3.1.min.js') ?>"></script>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel="stylesheet" />
    <?php elseif (esc($title) == 'detailMahasiswa' || esc($title) == 'detailDosen' || esc($title) == 'detailMatakuliah') : ?>
        <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="<?= base_url('vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

    <?php elseif (esc($title) == 'addDosen' || esc($title) == 'editDosen') : ?>
        <!-- Bootstrap -->
        <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
        <script src="<?= base_url('js/jquery-3.3.1.min.js') ?>"></script>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel="stylesheet" />
    <?php elseif (esc($title) == 'addJurusan' || esc($title) == 'editJurusan') : ?>
        <!-- Bootstrap -->
        <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
        <script src="<?= base_url('js/jquery-3.3.1.min.js') ?>"></script>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel="stylesheet" />
    <?php elseif (esc($title) == 'addMatakuliah' || esc($title) == 'editMatakuliah') : ?>
        <!-- Bootstrap -->
        <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
        <script src="<?= base_url('js/jquery-3.3.1.min.js') ?>"></script>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel="stylesheet" />
    <?php endif; ?>
</head>

<body class="nav-md">

    <?= $this->renderSection('content') ?>

    <?php if (esc($title) == 'admin') : ?>
        <!-- jQuery -->
        <script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
        <!-- NProgress -->
        <script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
        <!-- Chart.js -->
        <script src="<?= base_url('vendors/Chart.js/dist/Chart.min.js') ?>"></script>
        <!-- gauge.js -->
        <script src="<?= base_url('vendors/gauge.js/dist/gauge.min.js') ?>"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?= base_url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
        <!-- iCheck -->
        <script src="<?= base_url('vendors/iCheck/icheck.min.js') ?>"></script>
        <!-- Skycons -->
        <script src="<?= base_url('vendors/skycons/skycons.js') ?>"></script>
        <!-- Flot -->
        <script src="<?= base_url('vendors/Flot/jquery.flot.js') ?>"></script>
        <script src="<?= base_url('vendors/Flot/jquery.flot.pie.js') ?>"></script>
        <script src="<?= base_url('vendors/Flot/jquery.flot.time.js') ?>"></script>
        <script src="<?= base_url('vendors/Flot/jquery.flot.stack.js') ?>"></script>
        <script src="<?= base_url('vendors/Flot/jquery.flot.resize.js') ?>"></script>
        <!-- Flot plugins -->
        <script src="<?= base_url('vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
        <script src="<?= base_url('vendors/flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
        <script src="<?= base_url('vendors/flot.curvedlines/curvedLines.js') ?>"></script>
        <!-- DateJS -->
        <script src="<?= base_url('vendors/DateJS/build/date.js') ?>"></script>
        <!-- JQVMap -->
        <script src="<?= base_url('vendors/jqvmap/dist/jquery.vmap.js') ?>"></script>
        <script src="<?= base_url('vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
        <script src="<?= base_url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?= base_url('vendors/moment/min/moment.min.js') ?>"></script>
        <script src="<?= base_url('vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('build/js/custom.min.js') ?>"></script>

    <?php elseif (esc($title) == 'dataMahasiswa' || esc($title) == 'dataDosen'  || esc($title) == 'dataJurusan' || esc($title) == 'dataMatakuliah') : ?>
        <!-- jQuery -->
        <script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
        <!-- NProgress -->
        <script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
        <!-- iCheck -->
        <script src="<?= base_url('vendors/iCheck/icheck.min.js') ?>"></script>
        <!-- Datatables -->
        <script src="<?= base_url('vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
        <script src="<?= base_url('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
        <script src="<?= base_url('vendors/jszip/dist/jszip.min.js') ?>"></script>
        <script src="<?= base_url('vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
        <script src="<?= base_url('vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('build/js/custom.min.js') ?>"></script>
    <?php elseif (esc($title) == 'addMahasiswa' || esc($title) == 'editMahasiswa') : ?>
        <!-- jQuery -->
        <script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
        <!-- NProgress -->
        <script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
        <!-- validator -->
        <script src="<?= base_url('vendors/validator/validator.js') ?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('build/js/custom.min.js') ?>"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript">
            $('.filter_wilayah').select2({
                theme: "classic"
            });
            $("select").on("select2:close", function(e) {
                $(this).valid();
            });
        </script>
    <?php elseif (esc($title) == 'detailMahasiswa' || esc($title) == 'detailDosen' || esc($title) == 'detailMatakuliah') : ?>
        <!-- jQuery -->
        <script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
        <!-- NProgress -->
        <script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
        <!-- morris.js -->
        <script src="<?= base_url('vendors/raphael/raphael.min.js') ?>"></script>
        <script src="<?= base_url('vendors/morris.js/morris.min.js') ?>"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?= base_url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?= base_url('vendors/moment/min/moment.min.js') ?>"></script>
        <script src="<?= base_url('vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('build/js/custom.min.js') ?>"></script>

    <?php elseif (esc($title) == 'addDosen' || esc($title) == 'editDosen') : ?>
        <!-- jQuery -->
        <script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
        <!-- NProgress -->
        <script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
        <!-- validator -->
        <script src="<?= base_url('vendors/validator/validator.js') ?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('build/js/custom.min.js') ?>"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript">
            $('.filter_wilayah').select2({
                theme: "classic"
            });
        </script>
    <?php elseif (esc($title) == 'addJurusan' || esc($title) == 'editJurusan') : ?>
        <!-- jQuery -->
        <script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
        <!-- NProgress -->
        <script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
        <!-- validator -->
        <script src="<?= base_url('vendors/validator/validator.js') ?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('build/js/custom.min.js') ?>"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript">
            $('.filter_wilayah').select2({
                theme: "classic"
            });
        </script>
    <?php elseif (esc($title) == 'addMatakuliah' || esc($title) == 'editMatakuliah') : ?>
        <!-- jQuery -->
        <script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
        <!-- NProgress -->
        <script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
        <!-- validator -->
        <script src="<?= base_url('vendors/validator/validator.js') ?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('build/js/custom.min.js') ?>"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript">
            $('.filter_wilayah').select2({
                theme: "classic"
            });
        </script>
        <script src="<?= base_url('vendors/moment/min/moment.min.js') ?>"></script>
    <?php endif; ?>



    <!-- validasi picture -->
    <script>
        $("body").on("click", "#btnSubmit", function() {
            var allowedFiles = [".png", ".jpg", ".jpeg"];
            var fileUpload = $("#picture");
            var lblError = $("#lblError");
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
            let file = document.getElementById("picture").files[0];
            if (file == undefined) {
                let action = document.querySelector('#action')
                action.value = "true"
            } else {
                let action = document.querySelector('#action')
                action.value = "false"
            }
            console.log(action)
            if (file.size > 2097152) {
                lblError.html("file terlalu besar, max file 2mb");
                return false;
            }
            if (fileUpload.val().toLowerCase()) {
                if (!regex.test(fileUpload.val().toLowerCase())) {
                    lblError.html("Gunakan Extension: <b>" + allowedFiles.join(' ') + "</b> only.");
                    return false;
                }
                lblError.html('');
                return true;
            }
        });
    </script>

</body>

</html>