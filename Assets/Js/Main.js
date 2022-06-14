$(document).ready(function(){
    $('#menu').click(function(){
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('nav-toggle');
    });

    $('.accordion-heading').click(function(){
        $('.accordion .accordion-content').slideUp();
        $(this).next('.accordion-content').slideDown();
    });

})

