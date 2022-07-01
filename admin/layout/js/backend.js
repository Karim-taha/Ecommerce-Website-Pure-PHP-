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

    // Add (*) on required fileds in Edit user form: 
    // Important Note : the function did not work with me so I did it with span in <label> in the form in members page.

    // $('input').each(function (){
    //     if($(this).attr('required') === 'required'){
    //         $(this).after('<span class="asterisk">*</span>');
    //     }
    // });

    // Convert Password Field to Text Field on hover the eye icon:
    var passField = $('.password');
    $('.show-pass').hover(function () {
        passField.attr('type', 'text');
    }, function () {
        passField.attr('type', 'password');
    });

    // Confirm Deleting User :
    $('.confirm').click(function () {
        return confirm('Are You Sure?');
    });

    // Category View Option :
    $(".cat .h3").click(function(){
        $(this).next('.full-view').fadeToggle(300);
    });

    // $("optionView span").click(function(){
    //     $(this).addClass("activeView").siblings('span').removeClass("active");
    // });

    // if($(this).data('view') === 'full'){
    //     $("cat .full-view").fadeIn(200);
    // }else{
    //     $("cat .full-view").fadeOut(200);
    // }


    // if($(".optionView span").data("view") === 'full'){
    //     $("cat .full-view").fadeIn(200);
    // }else{
    //     $("cat .full-view").fadeOut(200);
    // }

});