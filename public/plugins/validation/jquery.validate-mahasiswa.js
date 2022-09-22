jQuery('.form-valide').validate({
  ignore: [],
  errorClass: 'invalid-feedback animated fadeInDown',
  errorElement: 'div',
  errorPlacement: function (e, a) {
    jQuery(a).parents('.form-group > div').append(e);
  },
  highlight: function (e) {
    jQuery(e)
      .closest('.form-group')
      .removeClass('is-invalid')
      .addClass('is-invalid');
  },
  success: function (e) {
    jQuery(e).closest('.form-group').removeClass('is-invalid'),
      jQuery(e).remove();
  },
  rules: {
    name: {
      required: !0,
      minlength: 5,
    },
    wali: {
      required: !0,
      minlength: 5,
    },
    jurusan: {
      required: !0,
    },
    alamat: {
      required: !0,
      minlength: 10,
    },
    tgl_lahir: {
      required: !0,
    },
    gender: {
      required: !0,
    },
    provinsi: {
      required: !0,
    },
    kabupaten: {
      required: !0,
    },
    kecamatan: {
      required: !0,
    },
    desa: {
      required: !0,
    },
    email: { required: !0, email: !0 },
    nisn: {
      required: !0,
      digits: !0,
    },
    npsn: {
      required: !0,
      digits: !0,
    },
    asal_sekolah: {
      required: !0,
    },
    no_telepon: {
      required: !0,
      digits: !0,
    },
  },
  messages: {
    name: {
      required: 'Masukan Nama Panjang',
      minlength: 'Minimal 5 character',
    },
    wali: {
      required: 'Masukan Nama Wali',
      minlength: 'Minimal 5 character',
    },
    alamat: {
      required: 'Masukan Alamat Mahasiswa',
      minlength: 'Minimal 10 character',
    },
    tgl_lahir: {
      required: 'Masukan Tanggal Lahir',
    },
    gender: {
      required: 'Masukan Jenis Kelamin',
    },
    no_telepon: {
      required: 'Masukan nomer telepon',
    },
    email: 'Masukan Email Dengan Benar',
    // 'val-password': {
    //   required: 'Please provide a password',
    //   minlength: 'Your password must be at least 5 characters long',
    // },
    // 'val-confirm-password': {
    //   required: 'Please provide a password',
    //   minlength: 'Your password must be at least 5 characters long',
    //   equalTo: 'Please enter the same password as above',
    // },
    // 'val-select2-multiple': 'Please select at least 2 values!',
    // 'val-suggestions': 'What can we do to become better?',
    // 'val-skill': 'Please select a skill!',
    // 'val-currency': 'Please enter a price!',
    // 'val-website': 'Please enter your website!',
    // 'val-phoneus': 'Please enter a US phone!',
    nisn: 'Masukan Nomer Valid',
    npsn: 'Masukan Nomer Valid',
    // 'val-number': 'Please enter a number!',
    // 'val-range': 'Please enter a number between 1 and 5!',
    // 'val-terms': 'You must agree to the service terms!',
  },
});
