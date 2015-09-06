$(document).ready(function(){
    $('.nav__menu__title').click(function(){
        $('.nav__menu').toggle();
    });
    $('.nav__menu li a').click(function(){
        $(this).siblings('ul').toggle();
    });
});

