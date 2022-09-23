<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> | <?= $title ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -- >
    <link href="<?= base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('vendors/animate.css/animate.min.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('build/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?= base_url('login') ?>" method="post">
                        <?= csrf_field(); ?>
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" name="nim" id="nim" placeholder="nim" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button class="btn login-form__btn submit w-100" type="submit">log in</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>
</body>

</html>