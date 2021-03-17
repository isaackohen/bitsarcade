import Glide from '@glidejs/glide';

let destroy = null, init;


$.on('/', function(){
  $('#search').keyup(function(){
 
   // Search text
   var text = $(this).val().toLowerCase();
 
   // Hide all content class element
   $('.slots_poster').hide();

   // Search 
   $('.slots_poster').each(function(){
 
    if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
     $(this).closest('.slots_poster').show();
    }
  });
 });
});



$.on('/', function(){
    $('.img-small-slots').lazy({
        effect: 'fadeIn',
        effectTime: '50',
        visibleOnly: true
        });
    
  $('#gamelist-search').keydown(function(){
 
   // Search text
   var text = $(this).val().toLowerCase();
 
   // Hide all content class element
   $('.slots_small_poster').hide();

   $('.img-small-slots').lazy({
          bind: "event"
        });

   // Search 
   $('.slots_small_poster').each(function(){
 
    if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
     $(this).closest('.slots_small_poster').show();
    }
  });
 });


$('.button-bar-small').tilt({
        glare: true,
        perspective: 900,
        scale: 1.05,
        maxGlare: .7

})

$('.slots_poster').tilt({
        glare: true,
        scale: 1.05,
        perspective: 400,
        maxGlare: .6
})

$('.game_poster').tilt({
        glare: true,
        scale: 1.05,
        perspective: 400,
        maxGlare: .6
})

    init = function() {
        if(window.location.pathname !== '/') return;

        if(destroy != null) destroy();

        const glide = new Glide('#slider', {
            type: 'slider',
            perView: 1,
            focusAt: 'center',
            gap: 0,
            autoplay: 20000,
            keyboard: false
        });
        glide.mount();
        destroy = function() {
            glide.destroy();
        }
    };

    if(destroy == null) {
        $(document).on('win5x:chatToggle', function() {
            setTimeout(init, 301);
        });
    }

    init();
}, ['/css/pages/index.css']);
