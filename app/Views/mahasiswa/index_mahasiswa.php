<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container body">
    <div class="main_container">

        <?= $this->include('layouts/sidebar') ?>

        <?= $this->include('layouts/navbar') ?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Profile Dosen</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive avatar-view" src="<?= base_url("uploads/picture/mahasiswa/" . session()->get('picture')) ?>" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal form-label-left" action="">
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="item form-group">
                                        <input type="hidden" name="kodeValidate" id="kodeValidate">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="kode" class="form-control col-md-7 col-xs-12" disabled value="<?= session()->get('name') ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="item form-group">
                                        <input type="hidden" name="kodeValidate" id="kodeValidate">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Nim <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="kode" class="form-control col-md-7 col-xs-12" disabled value="<?= session()->get('nim') ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="item form-group">
                                        <input type="hidden" name="kodeValidate" id="kodeValidate">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="kode" class="form-control col-md-7 col-xs-12" disabled value="<?= session()->get('email') ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="item form-group">
                                        <input type="hidden" name="kodeValidate" id="kodeValidate">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Kelas<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="kode" class="form-control col-md-7 col-xs-12" disabled value="<?= $kelas['name_kelas'] ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<?= $this->endSection() ?>