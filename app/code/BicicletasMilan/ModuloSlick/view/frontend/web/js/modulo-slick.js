require(['jquery', 'slick'], function($){
    $(document).ready(function(){
        $('.modulo-slick').slick({
            infinite: true,
            slidesToShow: 4,            
            autoplay: true,
            autoplaySpeed: 3000
        }); 
    });
 });