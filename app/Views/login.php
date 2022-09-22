<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/favicon.png')?>">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="<?= base_url('css/style.css')?>" rel="stylesheet">

</head>

<body class="h-100">

<div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <h4 class="text-center">Presensi Universitas 3 ges ya</h4>
                                <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url(); ?>/login">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" name="nim" id="nim" class="form-control" placeholder="Nim">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                    <br>
                                    <button class="btn login-form__btn submit w-100"><?=lang('Auth.loginAction')?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('plugins/common/common.min.js')?>"></script>
    <script src="<?= base_url('js/custom.min.js')?>"></script>
    <script src="<?= base_url('js/settings.js')?>"></script>
    <script src="<?= base_url('js/gleek.js')?>"></script>
    <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>
</body>

</html>




