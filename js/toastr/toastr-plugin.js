$(document).ready(function () {
    'use strict';

    /* Toastr */
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success('GreenNusa Computindo', 'Aplikasi Tujuh Sinar');
    }, 1300);
});

