import bitcoin from 'bitcoin-units';

let destroy = null, init;
$.on('/', function(){

$('.gamepostercard').tilt({
    glare: false,
    scale: 1.02
})


$('.provider-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    margin:5,
    autoplaySpeed: 250,
    autoplayTimeout:7000,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:false
        },
        450:{
            items:3,
            nav:false
        },
        830:{
            items:4,
            nav:false
        },
        1125:{
            items:5,
            nav:false
        },
        1190:{
            items:6,
            nav:false
        }
    }
})

$('.mascot').owlCarousel({
    loop:true,
    autoplay:true,
    margin:5,
    autoplaySpeed: 250,
    items:5,
    autoplayTimeout:12500,
    responsiveRefreshRate: 900,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav1123',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        375:{
            items:2,
            nav:false
        },
        760:{
            items:3,
            nav:false
        },
        950:{
            items:4,
            nav:false
        },
        1190:{
            items:5,
            nav:false
        }
    }
})

$('.casinogames').owlCarousel({
    loop:true,
    autoplay:true,
    margin:5,
    autoplaySpeed: 250,
    items:5,
    autoplayTimeout:12500,
    responsiveRefreshRate: 900,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav25',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        375:{
            items:2,
            nav:false
        },
        760:{
            items:3,
            nav:false
        },
        950:{
            items:4,
            nav:false
        },
        1190:{
            items:5,
            nav:false
        }
    }
})

$('.random').owlCarousel({
    loop:true,
    autoplay:false,
    margin:5,
    autoplaySpeed: 250,
    items:5,
    responsiveRefreshRate: 500,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav3',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        375:{
            items:2,
            nav:false
        },
        760:{
            items:3,
            nav:false
        },
        950:{
            items:4,
            nav:false
        },
        1190:{
            items:5,
            nav:false
        }
    }
})

$('.popular').owlCarousel({
    loop:true,
    autoplay:false,
    margin:5,
    autoplaySpeed: 250,
    items:5,
    responsiveRefreshRate: 600,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav2',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        375:{
            items:2,
            nav:false
        },
        760:{
            items:3,
            nav:false
        },
        950:{
            items:4,
            nav:false
        },
        1190:{
            items:5,
            nav:false
        }
    }
})


$('.provably').owlCarousel({
    loop:true,
    autoplay:true,
    autoplaySpeed: 250,
    margin:5,
    responsiveRefreshRate: 700,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav5',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    autoplayTimeout:18000,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        375:{
            items:2,
            nav:false
        },
        760:{
            items:3,
            nav:false
        },
        950:{
            items:4,
            nav:false
        },
        1190:{
            items:5,
            nav:false
        }
    }
})



$('.topcarousel').owlCarousel({
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    loop:true,
    autoplay:true,
    margin:5,
    items:1,
    autoplayTimeout:7500,
    responsiveRefreshRate: 300,
    responsiveBaseElement: ".pageContent",
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        1500:{
            items:1,
            nav:false
        }
    }
})

$('.evoplay').owlCarousel({
    loop:false,
    autoplay:false,
    margin:5,
    autoplaySpeed: 250,
    items:5,
    autoplayTimeout:12500,
    responsiveRefreshRate: 900,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav55',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        375:{
            items:2,
            nav:false
        },
        760:{
            items:3,
            nav:false
        },
        950:{
            items:4,
            nav:false
        },
        1190:{
            items:5,
            nav:false
        }
    }
})

$('.featured').owlCarousel({
    loop:true,
    autoplay:true,
    margin:5,
    autoplaySpeed: 250,
    items:5,
    autoplayTimeout:12500,
    responsiveRefreshRate: 900,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav4',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        375:{
            items:2,
            nav:false
        },
        760:{
            items:3,
            nav:false
        },
        950:{
            items:4,
            nav:false
        },
        1190:{
            items:5,
            nav:false
        }
    }
})



}, ['/css/pages/index.css']);
