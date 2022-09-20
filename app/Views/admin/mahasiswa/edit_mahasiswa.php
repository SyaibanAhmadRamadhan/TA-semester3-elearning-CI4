<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div id="main-wrapper">

        <!-- navbar -->
        <?= $this->include('layouts/navbar')?>
        <!-- end navbar -->

        <!-- sidebar -->
        <?= $this->include('layouts/sidebar')?>
        <!-- end sidebar -->

        <!--**********************************
            Content body start
        ***********************************-->
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
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="" method="post" enctype="multipart/form-data">
                                          <?= csrf_field(); ?>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter a username.." value="<?= $data->name ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter a email.." value="<?= $data->email ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nisn">NISN <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Enter a nomer induk siswa nasional.." value="<?= $data->NISN ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="npsn">NPSN <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="npsn" name="npsn" placeholder="Enter a nomer pokok sekolah nasional.." value="<?= $data->NPSN ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="wali">Wali <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="wali" name="wali" placeholder="Enter a wali.." value="<?= $data->wali ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tgl_lahir">Tgl Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Your valid email.." value="<?= $data->tgl_lahir ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tgl_lahir">Gender <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" value="pria" id="a1" name="gender" onclick="previewImage()" value="<?= $data->gender?>" <?= $data->gender == 'pria' ? 'checked': ''?> > Pria</label>
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" value="wanita" id="a2" name="gender" onclick="previewImage()" value="<?= $data->gender?> " <?= $data->gender == 'wanita' ? 'checked': ''?> > Wanita</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no_telepon">Nomer Telepon <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Enter a nomer telepon.."value="<?= $data->no_telepon?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="provinsi">Provinsi <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control filter_wilayah" id="provinsi" name="provinsi">
                                                    <option value="">Select Provinsi</option>
                                                    <?php
                                                        foreach ($provinsi as $x){
                                                            echo '<option value="'.$x['id'].'"', $data->nama_provinsi == $x['nama_provinsi'] ? 'selected' : '','>'.$x['nama_provinsi'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input type="hidden" id="kab" value="<?= $data->id_kabupaten ?>">
                                            <label class="col-lg-4 col-form-label" for="kabupaten">Kabupaten <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control filter_wilayah" id="kabupaten" name="kabupaten">
                                                <option value="">Select Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <input type="hidden" id="kec" value="<?= $data->id_kecamatan ?>">
                                            <label class="col-lg-4 col-form-label" for="kecamatan">Kecamatan <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control filter_wilayah" id="kecamatan" name="kecamatan">
                                                <option value="">Select Kecamatan</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <input type="hidden" id="des" value="<?= $data->id_desa ?>">
                                            <label class="col-lg-4 col-form-label" for="desa">Desa <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control filter_wilayah" id="desa" name="desa">
                                                    <option value="">Select Desa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="alamat">Alamat Detail<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="What would you like to see?"><?= $data->detail_alamat ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input type="hidden" name="oldPic" value="<?= $data->picture?>">
                                            <label class="col-lg-4 col-form-label" for="picture">Picture</label>
                                            <div class="col-lg-6">
                                                <img src="<?= base_url("uploads/picture/mahasiswa/".$data->picture) ?>" class="img-show mb-3 img-fluid rounded d-block" style="height: 200px" id="foto" alt=""><br>
                                                <input type="file" name="picture" class="form-control-file" id="picture" onchange="previewImage()" accept="doc,pdf,rtf,docx" >
                                                <input type="hidden" name="action" id="action">
                                                <span id="lblError" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">
                                            </label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="hapusPic">
                                                    <input type="checkbox" class="css-control-input" id="hapusPic" name="hapusPic" value="true" onchange="previewImage()"> <span class="css-control-indicator"></span> ckls jika ingin menghapus poto</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" id="btnSubmit" class="btn btn-primary">Submit</button>
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
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>


    <script>

    function previewImage() {
        const image = document.querySelector('#picture');
        const imageShow = document.querySelector('.img-show');
        const oldPic = document.querySelector('[name="oldPic"]').value;
        let hapusPic = document.querySelector('[name="hapusPic"]:checked')?.value;

        if(hapusPic){
            document.getElementById('picture').disabled = true;
            const pria = document.querySelector('[id="a1"]:checked')?.value;
            const wanita = document.querySelector('[id="a2"]:checked')?.value;
            image.value = ''
            if(pria){
                imageShow.src = "<?= base_url('uploads/picture/mahasiswa/cowok.jpeg') ?>";
            }else if(wanita){
                imageShow.src = "<?= base_url('uploads/picture/mahasiswa/cewek.jpeg') ?>";
            }
            $("input:radio[name=gender]").change(function() {
                let action = document.querySelector('#action')
                action.value = "true"
                var value = $(this).val();
                var image_name;
                console.log(value)
                if(value == 'pria'){
                    image_name = "<?= base_url('uploads/picture/mahasiswa/cowok.jpeg') ?>";
                }else if(value == 'wanita'){
                    image_name = "<?= base_url('uploads/picture/mahasiswa/cewek.jpeg') ?>";
                }
                $('#foto').attr('src', image_name);
            });
        }else if (image.value){
            document.getElementById('picture').disabled = false;
            console.log('image')
            let action = document.querySelector('#action')
            action.value = "false"
            imageShow.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                if (image.value){
                    imageShow.src = oFREvent.target.result;
                }
            }
        }
        else{
            document.getElementById('picture').disabled = false;
            imageShow.src = `<?= base_url('uploads/picture/mahasiswa')?>/${oldPic}`;
        }

    }
    </script>
<script>

$(document).ready(function(){
    var provinsi_id = $('#provinsi').val();

    if (provinsi_id) {
        var action = 'get_kabupaten';
        // CSRF Hash
       var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
       var csrfHash = $('.txt_csrfname').val(); // CSRF hash
        $.ajax({
            url:"<?php echo base_url('/WilayahController/action'); ?>",
            method:"POST",
            data:{provinsi_id:provinsi_id, action:action,[csrfName]: csrfHash },
            dataType:"JSON",
            success:function(data){
                var html = '<option value="">Select Kabupaten</option>';
                let kab = data.kabupaten
                let kabu = $('#kab').val();
                $('.txt_csrfname').val(data.token);
                for(var count = 0; count < kab.length; count++){
                    html += `<option value="${kab[count].id}" ${kabu == kab[count].id ? "selected" : ""}>${kab[count].nama_kabupaten}</option>`;
                }
                $('#kabupaten').html(html);
            }
        });

        var kabupaten_id = $('#kab').val();

        if (kabupaten_id) {
            var action = 'get_kecamatan';
            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            $.ajax({
                url:"<?php echo base_url('/WilayahController/action'); ?>",
                method:"POST",
                data:{kabupaten_id:kabupaten_id, action:action,[csrfName]: csrfHash},
                dataType:"JSON",
                success:function(data){
                    let kec = data.kecamatan
                    let keca = $('#kec').val();
                    $('.txt_csrfname').val(data.token);
                    var html = '<option value="">Select Kecamatan</option>';
                    for(var count = 0; count < kec.length; count++) {
                        html += `<option value="${kec[count].id}" ${keca == kec[count].id ? 'selected': ''}>${kec[count].nama_kecamatan}</option>`;
                    }
                    $('#kecamatan').html(html);
                }
            });
        }

        var kecamatan_id = $('#kec').val();
        if (kecamatan_id) {
            var action = 'get_desa';
            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            $.ajax({
                url:"<?php echo base_url('/WilayahController/action'); ?>",
                method:"POST",
                data:{kecamatan_id:kecamatan_id,action:action,[csrfName]: csrfHash},
                dataType:"JSON",
                success:function(data){
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

    $('#provinsi').change(function(){

        var provinsi_id = $('#provinsi').val();
        var action = 'get_kabupaten';
        // CSRF Hash
       var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
       var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        if(provinsi_id != ''){
            $.ajax({
                url:"<?php echo base_url('/WilayahController/action'); ?>",
                method:"POST",
                data:{provinsi_id:provinsi_id, action:action,[csrfName]: csrfHash },
                dataType:"JSON",
                success:function(data){
                    var html = '<option value="">Select Kabupaten</option>';
                    let kab = data.kabupaten
                    $('.txt_csrfname').val(data.token);
                    for(var count = 0; count < kab.length; count++){
                        html += '<option value="'+kab[count].id+'">'+kab[count].nama_kabupaten+'</option>';
                    }
                    $('#kabupaten').html(html);
                }
            });
        }else{
            $('#kabupaten').val('');
        }
    });



    $('#kabupaten').change(function(){

        var kabupaten_id = $('#kabupaten').val();
        var action = 'get_kecamatan';
        // CSRF Hash
       var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
       var csrfHash = $('.txt_csrfname').val(); // CSRF hash


        if(kabupaten_id != ''){
            $.ajax({
                url:"<?php echo base_url('/WilayahController/action'); ?>",
                method:"POST",
                data:{kabupaten_id:kabupaten_id, action:action,[csrfName]: csrfHash},
                dataType:"JSON",
                success:function(data){
                    let kec = data.kecamatan
                    $('.txt_csrfname').val(data.token);
                    var html = '<option value="">Select Kecamatan</option>';
                    for(var count = 0; count < kec.length; count++) {
                        html += '<option value="'+kec[count].id+'">'+kec[count].nama_kecamatan+'</option>';
                    }
                    $('#kecamatan').html(html);
                }
            });
        }else{
            $('#desa').val('');
        }

    });

    $("#kecamatan").change(function(){
        var kecamatan_id = $("#kecamatan").val();
        var action = "get_desa";
        // CSRF Hash
       var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
       var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        if (kecamatan_id != ""){
            $.ajax({
                url:"<?php echo base_url('/WilayahController/action'); ?>",
                method:"POST",
                data:{kecamatan_id:kecamatan_id,action:action,[csrfName]: csrfHash},
                dataType:"JSON",
                success:function(data){
                    let des = data.desa
                    $('.txt_csrfname').val(data.token);
                    var html = "<option value=''>Select Desa</option>"
                    for (let count = 0; count < des.length; count++) {
                        html += `<option value="${des[count].id}"> ${des[count].nama_desa} </option>`
                    }
                    $('#desa').html(html);
                }
            })
        }else{
            $("#desa").val('');
        }
    })

});

</script>
    <?= $this->endSection() ?>