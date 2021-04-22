import bitcoin from 'bitcoin-units';

let destroy = null, init;
$.on('/', function(){

$('.gamepostercard').tilt({
    glare: false,
    scale: 1.01
})


$('.provider-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    smartSpeed: 500,
    margin:10,
    autoplayTimeout:20000,
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
        925:{
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

$('.random').owlCarousel({
    loop:true,
    autoplay:false,
    margin:10,
    smartSpeed: 500,
    items:5,
    responsiveRefreshRate: 450,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav3',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        450:{
            items:2,
            nav:false
        },
        925:{
            items:3,
            nav:false
        },
        1125:{
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
    margin:10,
    smartSpeed: 500,
    items:5,
    autoplayTimeout:10000,
    responsiveRefreshRate: 450,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav2',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        450:{
            items:2,
            nav:false
        },
        925:{
            items:3,
            nav:false
        },
        1125:{
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
    smartSpeed: 300,
    autoplaySpeed: 300,
    margin:10,
    responsiveRefreshRate: 450,
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
        450:{
            items:2,
            nav:false
        },
        925:{
            items:3,
            nav:false
        },
        1125:{
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
    margin:10,
    smartSpeed: 500,
    items:5,
    autoplayTimeout:10000,
    responsiveRefreshRate: 450,
    responsiveBaseElement: ".pageContent",
    navContainer: '#customNav4',
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        450:{
            items:2,
            nav:false
        },
        925:{
            items:3,
            nav:false
        },
        1125:{
            items:4,
            nav:false
        },
        1190:{
            items:5,
            nav:false
        }
    }
})


  $('.js-data-example-ajax').select2({
  ajax: {
    url: 'http://46.105.210.53/js/slots.json',
    dataType: 'json',
    type: "get",
    delay: 250,
    data: function (params) {
    return {
      q: params.term // search term
    };
   },
   processResults: function (response) {
     return {
        results: response.map(item => ({ id: item.id, text: item.text }))
     };
   },
  }
});

$(".js-data-example-ajax2").select2({
  ajax: { 
   url: 'http://46.105.210.53/js/slots.json',
   type: "post",
   dataType: 'json',
   delay: 250,
   data: function (params) {
    return {
      searchTerm: params.term // search term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
 });

$(".js-data-example-ajax3").select2({
        ajax: {
            url: 'http://46.105.210.53/js/slots.json',
            data: function (params) {
                var queryParameters = {  
                    //restrictedCountry: $("#resCountry").val(),  // pass your own parameter                
                    query: params.term, // search term like "a" then "an"
                    page: params.page
                };
                return queryParameters;
            },
            dataType: "json",
            cache: true,
            delay: 250,
            //type: 'POST',
            contentType: "application/json; charset=utf-8",
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data, function (val, item) {
                        return { id: val.id, text: val.text };
                    }),
                   // if more then 30 items in dropdown, remaining set of items  will be show on numbered page link in dropdown control.
                    pagination: { more: (params.page * 30) < data.length }
                };
            }
        },
        minimumInputLength: 1 // Minimum length of input in search box before ajax call triggers
    });


}, ['/css/pages/index.css']);
