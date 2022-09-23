<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container body">
    <div class="main_container">
        <?= $this->include('layouts/sidebar') ?>
        <?= $this->include('layouts/navbar') ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>User Report</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link" href="<?= base_url('admin/mahasiswa') ?>"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                    <div class="profile_img">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="img-responsive avatar-view" src="<?= base_url("uploads/picture/mahasiswa/" . $data->picture) ?>" alt="Avatar" title="Change the avatar">
                                        </div>
                                    </div>
                                    <h3><?= $data->name ?></h3>
                                    <br />
                                    <a class="btn btn-success" href="<?= base_url('admin/mahasiswa/' . $data->nim . '/edit') ?>"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                    <br />
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="true">Profile</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Data Sekolah</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Alamat</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="home-tab">
                                                <form action="">
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="nisn">Nomer Pokok Sekolah</label>
                                                            <input class="form-control" id="nisn" type="text" value="<?= $data->NPSN ?>" disabled>
                                                        </div>
                                                        <!-- Form Group (last name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="npsn">Nama Sekolah</label>
                                                            <input class="form-control" id="npsn" type="text" value="<?= $dataSekolah['sekolah'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (organization name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="no_telepon">Status Sekolah</label>
                                                            <input class="form-control" id="no_telepon" type="text" value="<?= $dataSekolah['status'] == 'S' ? 'swasta' : 'negri' ?>" disabled>
                                                        </div>
                                                        <!-- Form Group (location)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="gender">Provinsi</label>
                                                            <input class="form-control" id="gender" type="text" value="<?= $dataSekolah['propinsi'] ?>" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="gender">Kabupaten/Kota</label>
                                                            <input class="form-control" id="gender" type="text" value="<?= $dataSekolah['kabupaten_kota'] ?>" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="gender">Kecamatan</label>
                                                            <input class="form-control" id="gender" type="text" value="<?= $dataSekolah['kecamatan'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                <form action="">
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="nisn">Provinsi</label>
                                                            <input class="form-control" id="nisn" type="text" value="<?= $data->nama_provinsi ?>" disabled>
                                                        </div>
                                                        <!-- Form Group (last name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="npsn">Kabupaten/Kota</label>
                                                            <input class="form-control" id="npsn" type="text" value="<?= $data->nama_kabupaten ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (organization name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="no_telepon">Kecamatan</label>
                                                            <input class="form-control" id="no_telepon" type="text" value="<?= $data->nama_kecamatan ?>" disabled>
                                                        </div>
                                                        <!-- Form Group (location)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="gender">Kelurahan/Desa</label>
                                                            <input class="form-control" id="gender" type="text" value="<?= $data->nama_desa ?>" disabled>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                                                <form action="">
                                                    <div class="row gx-3 mb-3">
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="nama">Nama Lengkap</label>
                                                            <input class="form-control" id="nama" type="text" value="<?= $data->name ?>" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="email">Email address</label>
                                                            <input class="form-control" id="email" type="email" value="<?= $data->email ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="nisn">Nomer Induk Siswa Nasional</label>
                                                            <input class="form-control" id="nisn" type="text" value="<?= $data->NISN ?>" disabled>
                                                        </div>
                                                        <!-- Form Group (last name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="npsn">Jurusan</label>
                                                            <input class="form-control" id="npsn" type="text" value="<?= $data->name_jurusan ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (organization name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="no_telepon">No Telepon</label>
                                                            <input class="form-control" id="no_telepon" type="text" value="<?= $data->no_telepon ?>" disabled>
                                                        </div>
                                                        <!-- Form Group (location)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="gender">Jenis Kelamin</label>
                                                            <input class="form-control" id="gender" type="text" value="<?= $data->gender ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (phone number)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="tanggal_lahir">Tanggal Lahir</label>
                                                            <input class="form-control" id="tanggal_lahir" type="tel" value="<?= $data->tgl_lahir ?>" disabled>
                                                        </div>
                                                        <!-- Form Group (birthday)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="nim">NIM</label>
                                                            <input class="form-control" id="nim" type="text" value="<?= $nim ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (phone number)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="tanggal_lahir">Kelas</label>
                                                            <input class="form-control" id="tanggal_lahir" type="tel" value="<?= $data->kelas ?>" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="tanggal_lahir">Semester</label>
                                                            <input class="form-control" id="tanggal_lahir" type="tel" value="<?= $semester['semester'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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


</div>
<?= $this->endSection() ?>