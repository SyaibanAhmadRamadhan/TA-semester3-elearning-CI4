<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php
function hari_ini()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $hari_ini = "minggu";
            break;

        case 'Mon':
            $hari_ini = "senin";
            break;

        case 'Tue':
            $hari_ini = "selasa";
            break;

        case 'Wed':
            $hari_ini = "rabu";
            break;

        case 'Thu':
            $hari_ini = "kamis";
            break;

        case 'Fri':
            $hari_ini = "jumat";
            break;

        case 'Sat':
            $hari_ini = "sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }
    return $hari_ini;
}
?>
<div class="container body">
    <div class="main_container">

        <?= $this->include('layouts/sidebar') ?>

        <?= $this->include('layouts/navbar') ?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Users <small>Some examples to get you started</small></h3>
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Absensi Dosen<small>*</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <form method="post" action="<?= base_url('dosen/absensiDosen') ?>">
                                            <?= csrf_field() ?>
                                            <?php if ($matkul['hari'] == hari_ini()) : ?>
                                                <?php if (date('H:i') > $matkul['masuk'] && date('H:i') < $matkul['selesai']) : ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">MASUK</button>
                                                <?php else : ?>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" disabled>BELUM MULAI</button>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" disabled>BELUM MULAI</button>
                                            <?php endif ?>
                                        </form>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                </p>
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Matakuliah</th>
                                            <th class="text-center">Pertemuan</th>
                                            <th class="text-center">Rangkuman</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($absen as $x) : ?>
                                            <tr>
                                                <td class="text-center"><?= $x['status'] ?></td>
                                                <td class="text-center"><?= $x['tanggal_masuk'] ?></td>
                                                <td class="text-center"><?= $x['kode_matkul'] ?></td>
                                                <td class="text-center"><?= $x['pertemuan'] ?></td>
                                                <?php
                                                if ($x['keterangan'] == 'berlangsung') : ?>
                                                    <td>
                                                        <div class="row text-center">
                                                            <form action="<?= base_url('dosen/rangkumanDosen') ?>" method="post">
                                                                <?= csrf_field() ?>
                                                                <textarea class="form-control" class="form-control" id="rangkuman" name="rangkuman" cols="20" rows="10"><?= $x['rangkuman'] ?></textarea>
                                                                <button type="submit" id="buttonRangkuman" class="btn btn-sm btn-outline-secondary">SUBMIT</button>
                                                                <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                                <input type="hidden" name="kode_matkul" id="kode_matkul" value="<?= $x['kode_matkul'] ?>">
                                                                <input type="hidden" name="tanggal_masuk" id="tanggal_masuk" value="<?= $x['tanggal_masuk'] ?>">
                                                                <input type="hidden" name="waktu_masuk" id="waktu_masuk" value="<?= $x['waktu_masuk'] ?>">
                                                                <input type="hidden" name="id_absen" id="id_absen" value="<?= $x['id'] ?>">
                                                            </form>
                                                        </div>
                                                    </td>
                                                <?php elseif ($x['keterangan'] == 'selesai') : ?>
                                                    <td class="text-center"><?= $x['rangkuman'] ?></td>
                                                <?php endif ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h2 class="h2">Apakah Yakin Untuk Menghapus Mahasiswa?</h2>
                                        <p>Data Mahasiswa Akan Terhapus Secara Permanent</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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

<?= $this->endSection() ?>