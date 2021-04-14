import bitcoin from 'bitcoin-units';
import 'owl.carousel';

let destroy = null, init;
$.on('/', function(){

var owl = $('.owl-carousel');
owl.owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:5250,
    smartSpeed: 200,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:false
        },
        725:{
            items:2,
            nav:false
        },
        925:{
            items:3,
            nav:false
        },
        1100:{
            items:4,
            nav:false
        },
        1170:{
            items:5,
            nav:false
        }
    }
});




}, ['/css/pages/index.css']);
