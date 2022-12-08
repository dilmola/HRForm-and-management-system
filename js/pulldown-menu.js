$(document).ready(function(){
    $('.nav__link').click(function(){
        $(this).next('.sub-menu').slideToggle();
   });
});