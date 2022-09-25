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
                        <h3>Add Jurusan</h3>
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
                            <div class="x_content">
                                <div class="alert alert-warning alert-dismissible fade show" id="allert" role="alert" style="display: none;">
                                    <div id="uname_response"></div>
                                </div>
                                <form class="form-horizontal form-label-left" action="" method="post" novalidate>
                                    <?= csrf_field() ?>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Jurusan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" value="<?= $data['name_jurusan'] ?>" name="name" placeholder="masukan nama jurusan..." required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <input type="hidden" name="kodeValidate" id="kodeValidate" value="<?= $data['kode'] ?>">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Kode Jurusan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="kode" class="form-control col-md-7 col-xs-12"  data-validate-linked="kodeValidate" value="<?= $data['kode'] ?>" name="kode" placeholder="masukan kode jurusan..." required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <input type="hidden" id="created_at" value="<?= $data['created_at'] ?>">
                                </form>
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
    $(document).ready(function(){
        $('#kode').keyup(function() {
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let kode = $('#kode').val();
            let created_at = document.getElementById('created_at').value;
            if (kode != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateJurusan'); ?>",
                    method: 'post',
                    dataType: "JSON",
                    data: {
                        kode: kode,
                        created_at:created_at,
                        [csrfName]: csrfHash
                    },
                    success: function(data) {
                        console.log('rama');
                        let kodeHid = document.getElementById('kodeValidate').value = data.validate;
                        if (kodeHid) {
                            
                        } else {
                            let hid = document.getElementById('kodeValidate').value = document.getElementById('kode').value
                            document.getElementById('btnSubmit').disabled = false;
                        }
                        $('.txt_csrfname').val(data.token);
                    }
                });
            }
        })
    })
</script>
<?= $this->endSection() ?>