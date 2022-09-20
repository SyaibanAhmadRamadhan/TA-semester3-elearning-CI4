<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div id="main-wrapper">

        <!-- navbar -->
        <?= $this->include('layouts/navbar')?>
        <!-- end navbar -->

        <!-- sidebar -->
        <?= $this->include('layouts/sidebar')?>
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
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
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
                                            <?php foreach($mahasiswa as $x): ?>
                                                <tr>
                                                    <td><?= $x['id'] ?></td>
                                                    <td><?= $x['name']?></td>
                                                    <td><?= $x['tgl_lahir']?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/mahasiswa/'.$x['id'].'/detail') ?>" class="btn btn-sm btn-outline-secondary" target="_blank">Preview</a>
                                                        <a href="<?= base_url('admin/mahasiswa/'.$x['id'].'/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                                        <a href="#" data-href="<?= base_url('admin/mahasiswa/'.$x['id'].'/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>

                                        </tbody>
                                    </table>
                                    <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-body">
                                            <h2 class="h2">Are you sure?</h2>
                                            <p>The data will be deleted and lost forever</p>
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
function confirmToDelete(el){
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
}
</script>
<?= $this->endSection() ?>