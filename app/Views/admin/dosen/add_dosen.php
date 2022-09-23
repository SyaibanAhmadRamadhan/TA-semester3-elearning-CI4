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
                        <h3>Add Mahasiswa</h3>
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
                                <form class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data" novalidate>
                                    <?= csrf_field() ?>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" id="name" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                                        </div>
                                    </div>
                                    <input type="hidden" name="hid" id="hid">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" data-validate-linked="hid" placeholder="enter a email valid">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="asal_universitas">Asal Universitas <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" required="required" id="asal_universitas" name="asal_universitas" placeholder="Enter a nomer induk siswa nasional..">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir">Tanggal Lahir <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="date" class="form-control col-md-7 col-xs-12" required="required" id="tgl_lahir" name="tgl_lahir" placeholder="tanggal lahir..">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Jenis Kelamin <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="radio-inline mr-3">
                                                <input type="radio" value="pria" id="a1" name="gender" onclick="previewImage()" checked> Pria</label>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" value="wanita" id="a2" name="gender" onclick="previewImage()"> Wanita</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="hid2" id="hid2">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_telepon">Nomor Telepon <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="tel" class="form-control col-md-7 col-xs-12" required="required" id="no_telepon" name="no_telepon" data-validate-linked="hid2" placeholder="Enter a nomer induk siswa nasional..">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jurusan">Jurusan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="jurusan" name="jurusan" required="required" type="select">
                                                <option value="">Select Jurusan</option>
                                                <?php
                                                foreach ($jurusan as $x) {
                                                    echo '<option value="' . $x['kode'] . '">' . $x['name_jurusan'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelas">Kelas <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="kelas" name="kelas[]" required multiple>
                                                <option value="">Select Kelas</option>
                                                <?php
                                                foreach ($kelas as $x) {
                                                    echo '<option value="' . $x['id'] . '">' . $x['name_kelas'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="provinsi">Provinsi <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="provinsi" name="provinsi" required>
                                                <option value="">Select Provinsi</option>
                                                <?php
                                                foreach ($provinsi as $x) {
                                                    echo '<option value="' . $x['id'] . '">' . $x['nama_provinsi'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kabupaten">Kabupaten <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="kabupaten" name="kabupaten" required>
                                                <option value="">Select Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kecamatan">Kecamatan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="kecamatan" name="kecamatan" required>
                                                <option value="">Select Kecamatan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desa">Desa <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="desa" name="desa" required>
                                                <option value="">Select Desa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat Detail <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control" required id="alamat" name="alamat" rows="5" placeholder="What would you like to see?"></textarea>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="picture">Picture <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img class="img-show mb-3 img-fluid rounded d-block" src="<?= base_url('uploads/picture/mahasiswa/cowok.jpeg') ?>" style="height: 200px" id="foto" alt=""><br><br>
                                            <input type="file" name="picture" class="form-control-file" id="picture" onchange="previewImage()" accept="doc,pdf,rtf,docx">
                                            <input type="hidden" name="action" id="action">
                                            <span id="lblError" style="color: red;"></span>
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
    function previewImage() {
        const image = document.querySelector('#picture');
        const imageShow = document.querySelector('.img-show');
        imageShow.src = ''
        if (image.value) {
            let action = document.querySelector('#action')
            action.value = "false"
            console.log(action.value)
            imageShow.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                if (image.value) {
                    imageShow.src = oFREvent.target.result;
                }
            }
        } else {
            const pria = document.querySelector('[id="a1"]:checked')?.value;
            const wanita = document.querySelector('[id="a2"]:checked')?.value;
            if (pria) {
                imageShow.src = "<?= base_url('uploads/picture/mahasiswa/cowok.jpeg') ?>";
            } else if (wanita) {
                imageShow.src = "<?= base_url('uploads/picture/mahasiswa/cewek.jpeg') ?>";
            }
            $("input:radio[name=gender]").change(function() {
                let action = document.querySelector('#action')
                action.value = "true"
                var value = $(this).val();
                var image_name;
                console.log(value)
                if (value == 'pria') {
                    image_name = "<?= base_url('uploads/picture/mahasiswa/cowok.jpeg') ?>";
                } else if (value == 'wanita') {
                    image_name = "<?= base_url('uploads/picture/mahasiswa/cewek.jpeg') ?>";
                }
                $('#foto').attr('src', image_name);
            });
        }

    }
</script>

<script>
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var provinsi_id = $('#provinsi').val();
            var wilayah = 'get_kabupaten';
            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            if (provinsi_id != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/wilayah'); ?>",
                    method: "POST",
                    data: {
                        provinsi_id: provinsi_id,
                        wilayah: wilayah,
                        [csrfName]: csrfHash
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">Select Kabupaten</option>';
                        let kab = data.kabupaten
                        $('.txt_csrfname').val(data.token);
                        for (var count = 0; count < kab.length; count++) {
                            html += '<option value="' + kab[count].id + '">' + kab[count].nama_kabupaten + '</option>';
                        }
                        $('#kabupaten').html(html);
                    }
                });
            } else {
                $('#kabupaten').val('');
            }
        });

        $('#kabupaten').change(function() {
            var kabupaten_id = $('#kabupaten').val();
            var wilayah = 'get_kecamatan';
            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash


            if (kabupaten_id != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/wilayah'); ?>",
                    method: "POST",
                    data: {
                        kabupaten_id: kabupaten_id,
                        wilayah: wilayah,
                        [csrfName]: csrfHash
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let kec = data.kecamatan
                        $('.txt_csrfname').val(data.token);
                        var html = '<option value="">Select Kecamatan</option>';
                        for (var count = 0; count < kec.length; count++) {
                            html += '<option value="' + kec[count].id + '">' + kec[count].nama_kecamatan + '</option>';
                        }
                        $('#kecamatan').html(html);
                    }
                });
            } else {
                $('#desa').val('');
            }

        });

        $("#kecamatan").change(function() {
            var kecamatan_id = $("#kecamatan").val();
            var wilayah = "get_desa";
            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            if (kecamatan_id != "") {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/wilayah'); ?>",
                    method: "POST",
                    data: {
                        kecamatan_id: kecamatan_id,
                        wilayah: wilayah,
                        [csrfName]: csrfHash
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let des = data.desa
                        $('.txt_csrfname').val(data.token);
                        var html = "<option value=''>Select Desa</option>"
                        for (let count = 0; count < des.length; count++) {
                            html += `<option value="${des[count].id}"> ${des[count].nama_desa} </option>`
                        }
                        $('#desa').html(html);
                    }
                })
            } else {
                $("#desa").val('');
            }
        })


    });
</script>


<script>
    $(document).ready(function() {
        $('#email').keyup(function() {
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let email = $('#email').val();
            if (email != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateDosen'); ?>",
                    method: 'post',
                    dataType: "JSON",
                    data: {
                        email: email,
                        nip: '',
                        [csrfName]: csrfHash
                    },
                    success: function(data) {
                        let noTelepon = document.getElementById('hid2').value;
                        let hidEmail = document.getElementById('hid').value = data.validate;
                        let allert = document.getElementById('allert');
                        if (hidEmail) {
                            allert.style.display = 'block';
                            document.getElementById('btnSubmit').disabled = true;
                        } else if (noTelepon != document.getElementById('no_telepon').value) {
                            let hid = document.getElementById('hid').value = document.getElementById('email').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else {
                            let hid = document.getElementById('hid').value = document.getElementById('email').value
                            document.getElementById('btnSubmit').disabled = false;
                            allert.style.display = 'none';
                        }
                        $('.txt_csrfname').val(data.token);
                    }
                });
            }
        })
        $('#no_telepon').keyup(function() {
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let no_telepon = $('#no_telepon').val();
            if (no_telepon != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateDosen'); ?>",

                    method: 'post',
                    dataType: "JSON",
                    data: {
                        no_telepon: no_telepon,
                        nip: '',
                        [csrfName]: csrfHash
                    },
                    success: function(data) {
                        let id = document.getElementById('uname_response');
                        let hidEmail = document.getElementById('hid').value;
                        let noTelepon = document.getElementById('hid2').value = data.validate;
                        let allert = document.getElementById('allert');
                        if (noTelepon) {
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else if (hidEmail != document.getElementById('email').value) {
                            let hid = document.getElementById('hid2').value = document.getElementById('no_telepon').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                            id.textContent = hidEmail;
                        } else {
                            let hid = document.getElementById('hid2').value = document.getElementById('no_telepon').value
                            document.getElementById('btnSubmit').disabled = false;
                            allert.style.display = 'none';

                        }
                        $('.txt_csrfname').val(data.token);
                    }
                });
            }
        })

    })
</script>


<?= $this->endSection() ?>