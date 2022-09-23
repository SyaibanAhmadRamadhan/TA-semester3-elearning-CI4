<!DOCTYPE html>
<html <?= esc($title) == 'login' ? "class='h-100'" : "" ?> lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>3 universe - <?= $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/favicon.png') ?>">
    <!-- Pignose Calender -->
    <?php if (esc($title) == 'login') : ?>
        <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <?php else : ?>
        <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
        <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <!-- <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet"> -->
    <?php endif; ?>
    <!-- Custom Stylesheet -->
    <script src="<?= base_url('js/jquery-3.3.1.min.js') ?>"></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel="stylesheet" />
</head>

<body <?= esc($title) == 'login' ? "class='h-100'" : "" ?>>

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <?= $this->renderSection('content') ?>

    <?php if (esc($title) == 'login') : ?>
        <script src="<?= base_url('plugins/common/common.min.js') ?>"></script>
        <script src="<?= base_url('js/custom.min.js') ?>"></script>
        <script src="<?= base_url('js/settings.js') ?>"></script>
        <script src="<?= base_url('js/gleek.js') ?>"></script>
        <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>

    <?php elseif (esc($title) == 'addMahasiswa' || esc($title) == 'editMahasiswa') : ?>
        <script src="<?= base_url('plugins/common/common.min.js') ?>"></script>
        <script src="<?= base_url('js/custom.min.js') ?>"></script>
        <script src="<?= base_url('js/settings.js') ?>"></script>
        <script src="<?= base_url('js/gleek.js') ?>"></script>
        <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>

        <script src="<?= base_url('plugins/validation/jquery.validate.min.js') ?>"></script>
        <script src="<?= base_url('plugins/validation/jquery.validate-mahasiswa.js') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript">
            $('.filter_wilayah').select2({
                theme: "classic"
            });
            $("select").on("select2:close", function(e) {
                $(this).valid();
            });
        </script>
    <?php elseif (esc($title) == 'dataMahasiswa') : ?>
        <script src="<?= base_url('plugins/common/common.min.js') ?>"></script>
        <script src="<?= base_url('js/custom.min.js') ?>"></script>
        <script src="<?= base_url('js/settings.js') ?>"></script>
        <script src="<?= base_url('js/gleek.js') ?>"></script>
        <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>

        <script src="<?= base_url('plugins/tables/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') ?>"></script>
        <script src="<?= base_url('plugins/tables/js/datatable-init/datatable-basic.min.js') ?>"></script>

    <?php else : ?>
        <script src="<?= base_url('js/custom.min.js') ?>"></script>
        <script src=" <?= base_url('js/dashboard/dashboard-1.js') ?>"></script>
    <?php endif; ?>



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