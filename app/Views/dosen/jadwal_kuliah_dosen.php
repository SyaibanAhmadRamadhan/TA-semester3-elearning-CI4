<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container body">
    <div class="main_container">

        <?= $this->include('layouts/sidebar') ?>

        <?= $this->include('layouts/navbar') ?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contacts Design</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <h1>Jadwal MataKuliah</h1>
                                    </div>

                                    <div class="clearfix"></div>

                                    <?php $i = 0;
                                    foreach ($matkul as $x) : ?>
                                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                            <div class="well profile_view">
                                                <div class="col-sm-12">
                                                    <div class="col-xs-12 text-center">
                                                        <h3 class="brief text-center"><?= $x['name_matkul'] ?></h3><br>
                                                        <h4 class="brief text-center"><i><?= $x['hari'] ?> - <?= $x['masuk'] ?>-<?= $x['selesai'] ?></i></h4>
                                                        <h4 class="brief text-center"><i><?= $jurusan[$i][0]['name_jurusan'] ?></i></h4>
                                                    </div>
                                                    <div class="left col-xs-7">
                                                        <h2><?= $x['kode_matkul'] ?></h2>
                                                        <p><strong>Kelas: </strong> <?= $daftarKelas[$i][0]['name_kelas'] ?> </p>
                                                        <p><strong>Ruangan: </strong> <?= $ruangan[$i][0]['no_ruang'] ?> </p>
                                                        <p><strong>Sks: </strong> <?= $x['sks'] ?> </p>
                                                    </div>
                                                    <div class="right col-xs-5 text-center">
                                                        <img src="images/user.png" alt="" class="img-circle img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 bottom text-center">
                                                    <div class="row">
                                                        <a class="btn btn-success btn-xs" href="<?= base_url('/dosen/jadwalDosen/' . $x['kode_matkul'] . '/kelas') ?>"> Masuk Kelas</a>
                                                        <a class="btn btn-primary btn-xs" href=""> Materi</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $i++;
                                    endforeach ?>
                                </div>
                            </div>
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