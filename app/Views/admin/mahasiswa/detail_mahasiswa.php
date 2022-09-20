<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row" style="justify-content: center !important; display: flex; margin-top: 2rem;">
        <div class="col">
            <div style="text-align: center; margin-bottom: 2rem">
                <img src="<?= base_url("uploads/picture/mahasiswa/".$data->picture) ?>" style="border-radius: 50%; height: 15rem; width: 15rem; " alt="tidak ada poto">

            </div>
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?= $data->name ?></td>
                </tr>
                <tr>
                <tr>
                    <td>Email</td>
                    <td><?= $data->email ?></td>
                </tr>
                <tr>
                    <td>Wali</td>
                    <td><?= $data->wali ?></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td><?= $data->NISN ?></td>
                </tr>
                <tr>
                    <td>NPSN</td>
                    <td><?= $data->NPSN ?></td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td><?= $data->no_telepon ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?= $data->gender ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><?= $data->tgl_lahir ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $data->detail_alamat ?></td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td><?= $data->nama_provinsi ?></td>
                </tr>
                <tr>
                    <td>Kabupaten/kota</td>
                    <td><?= $data->nama_kabupaten ?></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td><?= $data->nama_kecamatan ?></td>
                </tr>
                <tr>
                    <td>Desa/Kelurahan</td>
                    <td><?= $data->nama_desa ?></td>
                </tr>
                <!-- <tr>
                    <td colspan="2" style="text-align: center">
                        <a type="button" style="cursor:pointer" data-toggle="modal" data-target="#exampleModal{{ auth()->user()->id }}">EDIT YOUR DATA</a>

                    </td>
                </tr> -->

            </table>


        </div>
    </div>

</div>
<?= $this->endSection() ?>

