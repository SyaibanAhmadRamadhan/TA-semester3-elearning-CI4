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
                                            <input id="name" class="form-control col-md-7 col-xs-12" id="name" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text" value="<?= $data->name ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="hid" id="hid" value="<?= $data->email ?>">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" data-validate-linked="hid" placeholder="enter a email valid" value="<?= $data->email ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="hid1" id="hid1" value="<?= $data->NISN ?>">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">NISN <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="tel" class="form-control col-md-7 col-xs-12" required="required" id="nisn" name="nisn" data-validate-linked="hid1" placeholder="Enter a nomer induk siswa nasional.." value="<?= $data->NISN ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="hid3" id="hid3" value="<?= $data->NPSN ?>">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="npsn">NPSN <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" required id="npsn" name="npsn" placeholder="Enter a nomer pokok sekolah nasional.." data-validate-linked="hid3" value="<?= $data->NPSN ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wali">Wali <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" required="required" id="wali" name="wali" placeholder="Enter a wali.." value="<?= $data->wali ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir">Tanggal Lahir <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="date" class="form-control col-md-7 col-xs-12" required="required" id="tgl_lahir" name="tgl_lahir" placeholder="tanggal lahir.." value="<?= $data->tgl_lahir ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Jenis Kelamin <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="radio-inline mr-3">
                                                <input type="radio" value="pria" id="a1" name="gender" onclick="previewImage()" value="<?= $data->gender ?>" <?= $data->gender == 'pria' ? 'checked' : '' ?>> Pria</label>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" value="wanita" id="a2" name="gender" onclick="previewImage()" value="<?= $data->gender ?> " <?= $data->gender == 'wanita' ? 'checked' : '' ?>> Wanita</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="hid2" id="hid2" value="<?= $data->no_telepon ?>">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_telepon">Nomor Telepon <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="tel" class="form-control col-md-7 col-xs-12" required="required" id="no_telepon" name="no_telepon" data-validate-linked="hid2" placeholder="Enter a nomer induk siswa nasional.." value="<?= $data->no_telepon ?>">
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
                                                    echo '<option value="' . $x['kode'] . '"', $data->kode_jurusan == $x['kode'] ? 'selected' : '', '>' . $x['name_jurusan'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelas">Kelas <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="kelas" name="kelas" required>
                                                <option value="">Select Kelas</option>
                                                <?php
                                                foreach ($kelas as $x) {
                                                    echo '<option value="' . $x['id'] . '"', $data->name_kelas == $x['name_kelas'] ? 'selected' : '', '>' . $x['name_kelas'] . '</option>';
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
                                                    echo '<option value="' . $x['id'] . '"', $data->nama_provinsi == $x['nama_provinsi'] ? 'selected' : '', '>' . $x['nama_provinsi'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <input type="hidden" id="kab" value="<?= $data->id_kabupaten ?>">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kabupaten">Kabupaten <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="kabupaten" name="kabupaten" required>
                                                <option value="">Select Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <input type="hidden" id="kec" value="<?= $data->id_kecamatan ?>">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kecamatan">Kecamatan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="kecamatan" name="kecamatan" required>
                                                <option value="">Select Kecamatan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <input type="hidden" id="des" value="<?= $data->id_desa ?>">
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
                                            <textarea class="form-control" required id="alamat" name="alamat" rows="5" placeholder="What would you like to see?"><?= $data->detail_alamat ?></textarea>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <input type="hidden" name="oldPic" value="<?= $data->picture ?>">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="picture">Picture <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img src="<?= base_url("uploads/picture/mahasiswa/" . $data->picture) ?>" class="img-show mb-3 img-fluid rounded d-block" style="height: 200px" id="foto" alt=""><br><br>
                                            <input type="file" name="picture" class="form-control-file" id="picture" onchange="previewImage()" accept="doc,pdf,rtf,docx">
                                            <input type="hidden" name="action" id="action">
                                            <span id="lblError" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="picture"> <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="css-control css-control-primary css-checkbox" for="hapusPic">
                                                <input type="checkbox" class="css-control-input" id="hapusPic" name="hapusPic" value="true" onchange="previewImage()"> <span class="css-control-indicator"></span> ckls jika ingin menghapus poto</label>
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
                                    <input type="hidden" value="<?= $data->nim ?> " id="nim">
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

<!-- immage -->
<script>
    function previewImage() {
        const image = document.querySelector('#picture');
        const imageShow = document.querySelector('.img-show');
        const oldPic = document.querySelector('[name="oldPic"]').value;
        let hapusPic = document.querySelector('[name="hapusPic"]:checked')?.value;

        if (hapusPic) {
            document.getElementById('picture').disabled = true;
            const pria = document.querySelector('[id="a1"]:checked')?.value;
            const wanita = document.querySelector('[id="a2"]:checked')?.value;
            image.value = ''
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
        } else if (image.value) {
            document.getElementById('picture').disabled = false;
            console.log('image')
            let action = document.querySelector('#action')
            action.value = "false"
            imageShow.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                if (image.value) {
                    imageShow.src = oFREvent.target.result;
                }
            }
        } else {
            document.getElementById('picture').disabled = false;
            imageShow.src = `<?= base_url('uploads/picture/mahasiswa') ?>/${oldPic}`;
        }

    }
</script>


<script>
    $(document).ready(function() {
        var provinsi_id = $('#provinsi').val();

        if (provinsi_id) {
            var wilayah = 'get_kabupaten';
            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
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
                    let kabu = $('#kab').val();
                    $('.txt_csrfname').val(data.token);
                    for (var count = 0; count < kab.length; count++) {
                        html += `<option value="${kab[count].id}" ${kabu == kab[count].id ? "selected" : ""}>${kab[count].nama_kabupaten}</option>`;
                    }
                    $('#kabupaten').html(html);
                }
            });

            var kabupaten_id = $('#kab').val();

            if (kabupaten_id) {
                var wilayah = 'get_kecamatan';
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
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
                        let keca = $('#kec').val();
                        $('.txt_csrfname').val(data.token);
                        var html = '<option value="">Select Kecamatan</option>';
                        for (var count = 0; count < kec.length; count++) {
                            html += `<option value="${kec[count].id}" ${keca == kec[count].id ? 'selected': ''}>${kec[count].nama_kecamatan}</option>`;
                        }
                        $('#kecamatan').html(html);
                    }
                });
            }

            var kecamatan_id = $('#kec').val();
            if (kecamatan_id) {
                var wilayah = 'get_desa';
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
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
                        let desa = $('#des').val();
                        $('.txt_csrfname').val(data.token);
                        var html = "<option value=''>Select Desa</option>"
                        for (let count = 0; count < des.length; count++) {
                            html += `<option value="${des[count].id}" ${desa == des[count].id ? 'selected' : ''}> ${des[count].nama_desa} </option>`
                        }
                        $('#desa').html(html);
                    }
                });

            }
        }

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
            let nim = document.getElementById('nim').value;
            if (email != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/valid'); ?>",
                    method: 'post',
                    dataType: "JSON",
                    data: {
                        email: email,
                        nim: nim,
                        [csrfName]: csrfHash
                    },
                    success: function(data) {
                        let hidNisn = document.getElementById('hid1').value;
                        let noTelepon = document.getElementById('hid2').value;
                        let hidEmail = document.getElementById('hid').value = data.validate;
                        let allert = document.getElementById('allert');
                        let hidNpsn = document.getElementById('hid3').value
                        if (hidEmail) {
                            allert.style.display = 'block';
                            document.getElementById('btnSubmit').disabled = true;
                        } else if (hidNisn != document.getElementById('nisn').value) {
                            let hid = document.getElementById('hid').value = document.getElementById('email').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else if (noTelepon != document.getElementById('no_telepon').value) {
                            let hid = document.getElementById('hid').value = document.getElementById('email').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else if (hidNpsn != document.getElementById('npsn').value) {
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
        $('#nisn').keyup(function() {
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let nisn = $('#nisn').val();
            let nim = document.getElementById('nim').value;
            if (nisn != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/valid'); ?>",
                    method: 'post',
                    dataType: "JSON",
                    data: {
                        nisn: nisn,
                        nim: nim,
                        [csrfName]: csrfHash
                    },
                    success: function(data) {
                        let id = document.getElementById('uname_response');
                        let hidNisn = document.getElementById('hid1').value = data.validate;
                        let hidEmail = document.getElementById('hid').value;
                        let noTelepon = document.getElementById('hid2').value;
                        let allert = document.getElementById('allert');
                        let hidNpsn = document.getElementById('hid3').value
                        if (hidNisn) {
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else if (hidEmail != document.getElementById('email').value) {
                            let hid = document.getElementById('hid1').value = document.getElementById('nisn').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                            id.textContent = hidEmail;
                        } else if (noTelepon != document.getElementById('no_telepon').value) {
                            let hid = document.getElementById('hid1').value = document.getElementById('nisn').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                            id.textContent = noTelepon;
                        } else if (hidNpsn != document.getElementById('npsn').value) {
                            let hid = document.getElementById('hid1').value = document.getElementById('nisn').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                            id.textContent = hidNpsn;
                        } else {
                            let hid = document.getElementById('hid1').value = document.getElementById('nisn').value
                            document.getElementById('btnSubmit').disabled = false;
                            allert.style.display = 'none';

                        }
                        $('.txt_csrfname').val(data.token);
                    }
                });
            }
        })
        $('#npsn').keyup(function() {
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let npsn = $('#npsn').val();
            if (npsn != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/sekolah'); ?>",
                    method: 'post',
                    dataType: "JSON",
                    data: {
                        npsn: npsn,
                        [csrfName]: csrfHash
                    },
                    success: function(data) {
                        let id = document.getElementById('uname_response');
                        let hidNisn = document.getElementById('hid1').value;
                        let hidEmail = document.getElementById('hid').value;
                        let noTelepon = document.getElementById('hid2').value;
                        let hidNpsn = document.getElementById('hid3').value = data.validate;
                        let allert = document.getElementById('allert');
                        if (hidNpsn) {
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else if (hidEmail != document.getElementById('email').value) {
                            let hidNpsn = document.getElementById('hid3').value = data.npsn;
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else if (noTelepon != document.getElementById('no_telepon').value) {
                            let hidNpsn = document.getElementById('hid3').value = data.npsn;
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                            id.textContent = noTelepon;
                        } else if (hidNisn != document.getElementById('nisn').value) {
                            let hidNpsn = document.getElementById('hid3').value = data.npsn;
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else {
                            let hidNpsn = document.getElementById('hid3').value = data.npsn;
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
            let nim = document.getElementById('nim').value;
            if (no_telepon != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/valid'); ?>",

                    method: 'post',
                    dataType: "JSON",
                    data: {
                        no_telepon: no_telepon,
                        nim: nim,
                        [csrfName]: csrfHash
                    },
                    success: function(data) {
                        let id = document.getElementById('uname_response');
                        let hidNisn = document.getElementById('hid1').value;
                        let hidEmail = document.getElementById('hid').value;
                        let noTelepon = document.getElementById('hid2').value = data.validate;
                        let allert = document.getElementById('allert');
                        let hidNpsn = document.getElementById('hid3').value
                        if (noTelepon) {
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                        } else if (hidEmail != document.getElementById('email').value) {
                            let hid = document.getElementById('hid2').value = document.getElementById('no_telepon').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                            id.textContent = hidEmail;
                        } else if (hidNisn != document.getElementById('nisn').value) {
                            let hid = document.getElementById('hid2').value = document.getElementById('no_telepon').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                            id.textContent = hidNisn;
                        } else if (hidNpsn != document.getElementById('npsn').value) {
                            let hid = document.getElementById('hid2').value = document.getElementById('no_telepon').value
                            document.getElementById('btnSubmit').disabled = true;
                            allert.style.display = 'block';
                            id.textContent = hidNpsn;
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