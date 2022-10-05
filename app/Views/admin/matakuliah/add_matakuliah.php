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
                        <h3>Add Matakuliah</h3>
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
                                        <input type="hidden" name="validateName" id="validateName">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">name matakuliah <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" required="required" data-validate-linked="validateName" id="name" name="name" placeholder="Enter a name matakuliah..">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <input type="hidden" name="validateKode" id="validateKode">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">kode matakuliah <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" required="required" data-validate-linked="validateKode" id="kode" name="kode" placeholder="Enter a kode matakuliah..">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sks">Jumlah SKS <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="tel" class="form-control col-md-7 col-xs-12" required="required" id="sks" name="sks" placeholder="Enter a jumlah sks..">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="semester" name="semester" required="required" type="select">
                                                <option value="">Select semester</option>
                                                <?php if (date("M") < 6) : ?>
                                                    <option value="semester2">semester2</option>
                                                    <option value="semester4">semester4</option>
                                                    <option value="semester6">semester6</option>
                                                    <option value="semester6">semester8</option>
                                                <?php else : ?>
                                                    <option value="semester1">semester1</option>
                                                    <option value="semester3">semester3</option>
                                                    <option value="semester5">semester5</option>
                                                    <option value="semester7">semester7</option>
                                                <?php endif ?>
                                            </select>
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
                                            <select class="form-control filter_wilayah" id="kelas" name="kelas" required>
                                                <option value="">Select Jurusan dan Semester terlebih dahulu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dosen">Dosen <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="dosen" name="dosen" required>
                                                <option value="">Select Jurusan, Semester, kelas terlebih dahulu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_ruang">no ruangan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="no_ruang" name="no_ruang" required="required" type="select">
                                                <option value="">Select ruangan</option>
                                                <?php
                                                foreach ($ruang as $x) {
                                                    echo '<option value="' . $x['id'] . '">' . $x['no_ruang'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group item pmd-textfield pmd-textfield-floating-label">
                                        <input type="hidden" name="mulaiValidasi" id="mulaiValidasi">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sks">Jadwal Masuk <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="time" class="form-control" name="masuk" required data-validate-linked="mulaiValidasi" id="masuk" placeholder="12:10 AM">
                                        </div>
                                    </div>
                                    <div class="form-group item pmd-textfield pmd-textfield-floating-label">
                                        <input type="hidden" name="keluarValidasi" id="keluarValidasi">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keluar">Jadwal Keluar <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="time" class="form-control" name="keluar" required data-validate-linked="keluarValidasi" id="keluar" placeholder="12:10 AM">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hari">Hari <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control filter_wilayah" id="hari" name="hari" required="required" type="select">
                                                <option value="">Select Hari</option>
                                                <option value="senin">senin</option>
                                                <option value="selasa">selasa</option>
                                                <option value="rabu">rabu</option>
                                                <option value="kamis">kamis</option>
                                                <option value="jumat">jumat</option>
                                                <option value="sabtu">sabtu</option>
                                                <option value="minggu">minggu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="T7">Materi <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input required name='materi[]' accept="pdf" data-maxsize="5120" data-maxfile="2048" type="file" multiple />
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
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
    $(document).ready(function() {
        $('#semester').change(function() {
            let semester_id = $('#semester').val();
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let action = 'get_kelas';
            if (semester_id != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/matakuliah'); ?>",
                    method: "POST",
                    data: {
                        semester_id: semester_id,
                        [csrfName]: csrfHash,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let semester = data.data1
                        var html = '<option value="">Select Kelas</option>';
                        for (var count = 0; count < semester.length; count++) {
                            html += `<option value=${semester[count]['id']}>${semester[count]['name_kelas']}</option>`;

                        }
                        $('.txt_csrfname').val(data.token);
                        $('#kelas').html(html);
                    }
                })
            }
        })
        $('#kelas').change(function() {
            let kelas_id = $('#kelas').val();
            let jurusan_id = $('#jurusan').val();
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            if (kelas_id != '' || jurusan_id != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/matakuliah'); ?>",
                    method: "POST",
                    data: {
                        kelas_id: kelas_id,
                        jurusan_id: jurusan_id,
                        [csrfName]: csrfHash
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let kelas = data.data1
                        if (kelas == undefined) {
                            var html = '<option value="">Select Dosen</option>';
                        } else {
                            var html = '<option value="">Select Dosen</option>';
                            for (var count = 0; count < kelas.length; count++) {
                                html += `<option value=${kelas[count][0]['nip']}>${kelas[count][0]['nip']}</option>`;

                            }
                        }
                        $('.txt_csrfname').val(data.token);
                        $('#dosen').html(html);
                    }
                })
            }
        })
        $('#jurusan').change(function() {
            let kelas_id = $('#kelas').val();
            let jurusan_id = $('#jurusan').val();
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            if (kelas_id != '' || jurusan_id != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/matakuliah'); ?>",
                    method: "POST",
                    data: {
                        kelas_id: kelas_id,
                        jurusan_id: jurusan_id,
                        [csrfName]: csrfHash
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let kelas = data.data1
                        if (kelas == undefined) {
                            var html = '<option value="">Select Dosen</option>';
                        } else {
                            var html = '<option value="">Select Dosen</option>';
                            for (var count = 0; count < kelas.length; count++) {
                                html += `<option value=${kelas[count][0]['nip']}>${kelas[count][0]['name']}</option>`;

                            }
                        }
                        $('.txt_csrfname').val(data.token);
                        $('#dosen').html(html);
                    }
                })
            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#name').keyup(function() {
            let name = $('#name').val();
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let action = "name";
            if (name != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateMatakuliah'); ?>",
                    method: "POST",
                    data: {
                        name: name,
                        [csrfName]: csrfHash,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let name = data.data1
                        if (name == '') {
                            document.getElementById('validateName').value = document.getElementById('name').value
                        } else {
                            document.getElementById('validateName').value = data.data1
                        }

                        $('.txt_csrfname').val(data.token);
                    }
                })
            }
        })
        $('#kode').keyup(function() {
            let kode = $('#kode').val();
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let action = "kode";
            if (kode != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateMatakuliah'); ?>",
                    method: "POST",
                    data: {
                        kode: kode,
                        [csrfName]: csrfHash,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let name = data.data1
                        if (name == '') {
                            document.getElementById('validateKode').value = document.getElementById('kode').value
                        } else {
                            document.getElementById('validateKode').value = data.data1
                        }

                        $('.txt_csrfname').val(data.token);
                    }
                })
            }
        })
        $('#no_ruang').change(function() {
            let masuk_val = $('#masuk').val();
            let no_ruang_val = document.getElementById('no_ruang').value;
            let keluar_val = document.getElementById('keluar').value;
            let hari_val = document.getElementById('hari').value;

            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let action = 'no_ruang';
            if (no_ruang_val != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateMatakuliah'); ?>",
                    method: "POST",
                    data: {
                        masuk_val: masuk_val,
                        no_ruang_val: no_ruang_val,
                        keluar_val: keluar_val,
                        hari_val: hari_val,
                        [csrfName]: csrfHash,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let data2 = data.data1;
                        let mulai = document.getElementById('mulaiValidasi').value;
                        let keluar = document.getElementById('keluarValidasi').value;

                        if (data2 != '') {
                            document.getElementById('mulaiValidasi').value = data2
                            document.getElementById('keluarValidasi').value = data2
                        } else {
                            document.getElementById('mulaiValidasi').value = document.getElementById('masuk').value;
                            document.getElementById('keluarValidasi').value = document.getElementById('keluar').value;
                        }
                        $('.txt_csrfname').val(data.token);
                    }
                })
            }
        })
        $('#masuk').change(function() {
            let masuk_val = $('#masuk').val();
            let no_ruang_val = document.getElementById('no_ruang').value;
            let keluar_val = document.getElementById('keluar').value;
            let hari_val = document.getElementById('hari').value;

            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let action = 'no_ruang';
            if (masuk_val != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateMatakuliah'); ?>",
                    method: "POST",
                    data: {
                        masuk_val: masuk_val,
                        no_ruang_val: no_ruang_val,
                        keluar_val: keluar_val,
                        hari_val: hari_val,
                        [csrfName]: csrfHash,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let data2 = data.data1;
                        let mulai = document.getElementById('mulaiValidasi').value;
                        let keluar = document.getElementById('keluarValidasi').value;

                        if (data2 != '') {
                            document.getElementById('mulaiValidasi').value = data2
                            document.getElementById('keluarValidasi').value = data2
                        } else {

                            document.getElementById('mulaiValidasi').value = document.getElementById('masuk').value;
                            document.getElementById('keluarValidasi').value = document.getElementById('keluar').value;
                        }
                        $('.txt_csrfname').val(data.token);
                    }

                })
            }
        })
        $('#keluar').change(function() {
            let masuk_val = $('#masuk').val();
            let no_ruang_val = document.getElementById('no_ruang').value;
            let keluar_val = document.getElementById('keluar').value;
            let hari_val = document.getElementById('hari').value;

            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let action = 'no_ruang';
            if (keluar_val != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateMatakuliah'); ?>",
                    method: "POST",
                    data: {
                        masuk_val: masuk_val,
                        no_ruang_val: no_ruang_val,
                        keluar_val: keluar_val,
                        hari_val: hari_val,
                        [csrfName]: csrfHash,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let data2 = data.data1;
                        let mulai = document.getElementById('mulaiValidasi').value;
                        let keluar = document.getElementById('keluarValidasi').value;

                        if (data2 != '') {
                            document.getElementById('mulaiValidasi').value = data2
                            document.getElementById('keluarValidasi').value = data2
                        } else {

                            document.getElementById('mulaiValidasi').value = document.getElementById('masuk').value;
                            document.getElementById('keluarValidasi').value = document.getElementById('keluar').value;
                        }
                        $('.txt_csrfname').val(data.token);
                    }
                })
            }
        })
        $('#hari').change(function() {
            let masuk_val = $('#masuk').val();
            let no_ruang_val = document.getElementById('no_ruang').value;
            let keluar_val = document.getElementById('keluar').value;
            let hari_val = document.getElementById('hari').value;

            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            let action = 'no_ruang';
            if (hari_val != '') {
                $.ajax({
                    url: "<?php echo base_url('/AjaxController/validateMatakuliah'); ?>",
                    method: "POST",
                    data: {
                        masuk_val: masuk_val,
                        no_ruang_val: no_ruang_val,
                        keluar_val: keluar_val,
                        hari_val: hari_val,
                        [csrfName]: csrfHash,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let data2 = data.data1;
                        let mulai = document.getElementById('mulaiValidasi').value;
                        let keluar = document.getElementById('keluarValidasi').value;

                        if (data2 != '') {
                            document.getElementById('mulaiValidasi').value = data2
                            document.getElementById('keluarValidasi').value = data2
                        } else {

                            document.getElementById('mulaiValidasi').value = document.getElementById('masuk').value;
                            document.getElementById('keluarValidasi').value = document.getElementById('keluar').value;
                        }
                        $('.txt_csrfname').val(data.token);
                    }
                })
            }
        })
    })
</script>



<?= $this->endSection() ?>