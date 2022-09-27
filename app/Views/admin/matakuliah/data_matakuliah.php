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
                                <h2>Data Matakuliah<small>*</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                </p>
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Kode</th>
                                            <th class="text-center">Name Matkul</th>
                                            <th class="text-center">SKS</th>
                                            <th class="text-center">Jadwal</th>
                                            <th class="text-center">Jurusan</th>
                                            <th class="text-center">Dosen</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($matkul as $x) : ?>
                                            <tr>
                                                <td class="text-center"><?= $x['kode_matkul'] ?></td>
                                                <td class="text-center"><?= $x['name_matkul'] ?></td>
                                                <td class="text-center"><?= $x['sks'] ?></td>
                                                <td class="text-center"><?= $x['semester'] ?> | <?= $x['hari'] ?>, <?= $x['masuk'] ?>-<?= $x['selesai'] ?> | <?= $kelas[$i][0]['name_kelas'] ?> | <?= $ruangan[$i][0]['no_ruang'] ?>, lt <?= $ruangan[$i][0]['lantai'] ?>
                                                </td>
                                                <td class="text-center"><?= $jurusan[$i][0]['name_jurusan'] ?></td>
                                                <td class="text-center"><?= $dosen[$i][0]['name'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin/matakuliah/' . $x['kode_matkul'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                                    <a href="#" data-href="<?= base_url('admin/matakuliah/' . $x['kode_matkul'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h2 class="h2">Apakah Yakin Untuk Menghapus Matakuliah?</h2>
                                        <p>Data Matakuliah Akan Terhapus Secara Permanent</p>
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

<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
</script>
<?= $this->endSection() ?>