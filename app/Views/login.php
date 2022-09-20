<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <h4 class="text-center">Presensi Universitas 3 ges ya</h4>
                                <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url(); ?>/login">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" name="nim" id="nim" class="form-control" placeholder="Nim">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>





