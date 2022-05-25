$(function () {

    'use strict';

    // Hide placeholder on form focus :

    $('[placeholder]').focus(function () {

        // Take (username) word or (password) and store it in data-text
        $(this).attr('data-text' , $(this).attr('placeholder'));

        // Make placeholder empty:
        $(this).attr('placeholder', '');

        // When go out with the pointer the placeholder come back
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-text'));
    });

});