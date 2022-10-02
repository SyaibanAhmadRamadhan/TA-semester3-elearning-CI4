<script>
    $(document).ready(function() {
        $('#buttonRangkuman<?= $x['tanggal_masuk'] ?><?= $x['waktu_masuk'] ?>').click(function() {
            console.log('masuk');
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            let kode_matkul = $('#kode_matkul<?= $x['tanggal_masuk'] ?><?= $x['waktu_masuk'] ?>').val();
            let tanggal_masuk = $('#tanggal_masuk<?= $x['tanggal_masuk'] ?><?= $x['waktu_masuk'] ?>').val();
            let waktu_masuk = $('#waktu_masuk<?= $x['tanggal_masuk'] ?><?= $x['waktu_masuk'] ?>').val();
            let id_absen = $('#id_absen<?= $x['tanggal_masuk'] ?><?= $x['waktu_masuk'] ?>').val();
            let rangkuman = $('#rangkuman<?= $x['tanggal_masuk'] ?><?= $x['waktu_masuk'] ?>').val();
            $.ajax({
                url: '<?= base_url('/AjaxController/rangkumanMatkul') ?>',
                method: "POST",
                data: {
                    kode_matkul: kode_matkul,
                    tanggal_masuk: tanggal_masuk,
                    waktu_masuk: waktu_masuk,
                    id_absen: id_absen,
                    rangkuman: rangkuman,
                    [csrfName]: csrfHash
                },
                dataType: "JSON",
                success: function(data) {
                    location.reload();
                    $('.txt_csrfname').val(data.token);
                }
            })

        })
    })
</script>