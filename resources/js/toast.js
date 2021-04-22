import iziToast from 'izitoast';

$.success = function(message) {
    iziToast.success({
        'color': 'rgb(0, 255, 184)',
        'layout': '2',
        'titleSize': '17px',
        'messageSize': '16px',
        'messageHeight': '1.4',
        'message': message,
        'position': 'topCenter'
    });
};

$.error = function(message) {
    iziToast.error({
        'transitionIn': 'flipInX',
        'font-weight': '700',
        'titleSize': '17px',
        'messageSize': '16px',
        'transitionOut': 'flipOutX',
        'icon': 'ico-error',
        'message': message,
        'position': 'topCenter'
    });
};



$.warning = function(message) {
    iziToast.warning({
        'layout': '2',
        'titleSize': '17px',
        'messageSize': '16px',
        'messageHeight': '1.4',
        'message': message,
        'position': 'topCenter'
    });
};

$.info = function(message) {
    iziToast.info({
        'layout': '2',
        'titleSize': '17px',
        'messageSize': '16px',
        'messageHeight': '1.4',
        'message': message,
        'position': 'topCenter'
    });
};



 