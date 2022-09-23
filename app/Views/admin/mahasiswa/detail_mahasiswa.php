<?= $this->extend('layouts/main1') ?>
<?= $this->section('content') ?>

<div id="main-wrapper">
    <!-- navbar -->
    <?= $this->include('layouts/navbar') ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?= $this->include('layouts/sidebar') ?>
    <!-- end sidebar -->
    <div class="container-xl px-4 mt-4 content-body" class="mt-0 mb-4">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="<?= base_url("uploads/picture/mahasiswa/" . $data->picture) ?>" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">NAME PIC : <?= $data->picture ?></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Info</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="nama">Nama Lengkap</label>
                                <input class="form-control" id="nama" type="text" value="<?= $data->name ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="email">Email address</label>
                                <input class="form-control" id="email" type="email" value="<?= $data->email ?>" disabled>
                            </div>
                            <!-- Form Row-->
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
                            <!-- Form Row        -->
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
                            <!-- Form Row-->
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
                    </div>
                </div>
            </div>
            <div class="col-xl-4"></div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Adrres</div>
                    <div class="card-body">
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
                        <!-- Form Row        -->
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
                    </div>
                </div>
            </div>
            <div class="col-xl-4"></div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Info Sekolah</div>
                    <div class="card-body">
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
                        <!-- Form Row        -->
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
                        <a href="<?= base_url('admin/mahasiswa/' . $data->nim . '/edit') ?>" class="btn btn-xl   btn-outline-secondary">Edit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>

<script type="text/javascript">

</script>

</div>
<?= $this->endSection() ?>