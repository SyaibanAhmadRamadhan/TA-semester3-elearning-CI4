<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div id="main-wrapper">

    <!-- navbar -->
    <?= $this->include('layouts/navbar') ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?= $this->include('layouts/sidebar') ?>
    <!-- end sidebar -->
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Mahasiswa</h4>
                            <div class="table-responsive">
                                <form method="post" action="<?= base_url('http://localhost:8080/admin/mahasiswa/update/semester') ?>">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">UPDATE SEMESTER</button>
                                </form>
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Nim</th>
                                            <th>Name</th>
                                            <th>Tgl_lahir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($mahasiswa as $x) : ?>
                                            <tr>
                                                <td><?= $x['nim'] ?></td>
                                                <td><?= $x['name'] ?></td>
                                                <td><?= $x['tgl_lahir'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/mahasiswa/' . $x['nim'] . '/detail') ?>" class="btn btn-sm btn-outline-secondary">Preview</a>
                                                    <a href="<?= base_url('admin/mahasiswa/' . $x['nim'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                                    <a href="#" data-href="<?= base_url('admin/mahasiswa/' . $x['nim'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
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
            </div>
        </div>
        <!-- #/ container -->
    </div>
</div>
<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
</script>
<?= $this->endSection() ?>