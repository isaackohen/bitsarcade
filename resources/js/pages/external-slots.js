import Glide from '@glidejs/glide';

let destroy = null, init;

$.on('/slots', function(){
    init = function() {
        if(window.location.pathname !== '/slots') return;

        if(destroy != null) destroy();

        const glide = new Glide('#slider', {
            type: 'slider',
            perView: 1,
            focusAt: 'center',
            gap: 0,
            autoplay: 10000,
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
}, ['/css/pages/external-slots.css']);
