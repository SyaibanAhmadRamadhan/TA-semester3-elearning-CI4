jQuery('.form-valide').validate({
  rules: {
    name: {
      required: !0,
      minlength: 5,
    },
    alamat: {
      required: !0,
      minlength: 10,
    },
    tgl_lahir: {
      required: !0,
    },
    // 'val-password': {
    //   required: !0,
    //   minlength: 5,
    // },
    // 'val-confirm-password': {
    //   required: !0,
    //   equalTo: '#val-password',
    // },
    role: {
      required: !0,
    },
    // "val-select2-multiple": {
    //     required: !0,
    //     minlength: 2
    // },
    // "val-suggestions": {
    //     required: !0,
    //     minlength: 5
    // },
    // "val-skill": {
    //     required: !0
    // },
    // "val-currency": {
    //     required: !0,
    //     currency: ["$", !0]
    // },
    // "val-website": {
    //     required: !0,
    //     url: !0
    // },
    // "val-phoneus": {
    //     required: !0,
    //     phoneUS: !0
    // },
    // "val-digits": {
    //     required: !0,
    //     digits: !0
    // },
    // "val-number": {
    //     required: !0,
    //     number: !0
    // },
    // "val-range": {
    //     required: !0,
    //     range: [1, 5]
    // },
    // "val-terms": {
    //     required: !0
    // }
  },
  messages: {
    name: {
      required: 'Masukan Nama Panjang',
      minlength: 'Minimal 5 character',
    },
    alamat: {
      required: 'Masukan Alamat Mahasiswa',
      minlength: 'Minimal 10 character',
    },
    tgl_lahir: {
      required: 'Masukan Tanggal Lahir',
    },
    // 'val-email': 'Please enter a valid email address',
    // 'val-password': {
    //   required: 'Please provide a password',
    //   minlength: 'Your password must be at least 5 characters long',
    // },
    // 'val-confirm-password': {
    //   required: 'Please provide a password',
    //   minlength: 'Your password must be at least 5 characters long',
    //   equalTo: 'Please enter the same password as above',
    // },
    role: 'Please select a value!',
    // 'val-select2-multiple': 'Please select at least 2 values!',
    // 'val-suggestions': 'What can we do to become better?',
    // 'val-skill': 'Please select a skill!',
    // 'val-currency': 'Please enter a price!',
    // 'val-website': 'Please enter your website!',
    // 'val-phoneus': 'Please enter a US phone!',
    // 'val-digits': 'Please enter only digits!',
    // 'val-number': 'Please enter a number!',
    // 'val-range': 'Please enter a number between 1 and 5!',
    // 'val-terms': 'You must agree to the service terms!',
  },

  ignore: [],
  errorClass: 'invalid-feedback animated fadeInUp',
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
});

jQuery('.form-valide-with-icon').validate({
  rules: {
    'val-username': {
      required: !0,
      minlength: 3,
    },
    'val-password': {
      required: !0,
      minlength: 5,
    },
  },
  messages: {
    'val-username': {
      required: 'Please enter a username',
      minlength: 'Your username must consist of at least 3 characters',
    },
    'val-password': {
      required: 'Please provide a password',
      minlength: 'Your password must be at least 5 characters long',
    },
  },

  ignore: [],
  errorClass: 'invalid-feedback animated fadeInUp',
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
    jQuery(e)
      .closest('.form-group')
      .removeClass('is-invalid')
      .addClass('is-valid');
  },
});
