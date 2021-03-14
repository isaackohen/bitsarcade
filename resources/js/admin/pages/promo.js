const flatpickr = require("flatpickr").default;
$.on('/admin/promo', function() {
    flatpickr('#expires', {
        enableTime: true,
        dateFormat: "d-m-Y H:i",
        time_24hr: true
    });
	flatpickr('#expires-freespin', {
        enableTime: true,
        dateFormat: "d-m-Y H:i",
        time_24hr: true
    });

    $('#finish').on('click', function() {
        $('#close').click();
        $.request('/admin/promocode/create', {
            code: $('#code').val(),
            usages: $('#usages').val(),
            expires: $('#expires').val(),
            sum: $('#sum').val(),
            currency: $('#currency').val()
        }).then(function() {
            window.location.reload();
        }, function(error) {
            if(error >= 1) $.error('Ошибка ' + error);
            else $.error($.parseValidation(error, {
                code: 'Code',
                usages: 'Max usages',
                expires: 'Expires',
                sum: 'Sum',
                currency: 'Currency'
            }));
        });
    });
	
	    $('#finish-freespin').on('click', function() {
        $('#close').click();
        $.request('/admin/promocode/create', {
            code: $('#code-freespin').val(),
            usages: $('#usages-freespin').val(),
            expires: $('#expires-freespin').val(),
            sum: $('#amount').val(),
            currency: 'freespin' 
        }).then(function() {
            window.location.reload();
        }, function(error) {
            if(error >= 1) $.error('Ошибка ' + error);
            else $.error($.parseValidation(error, {
                code: 'Code',
                usages: 'Max usages',
                expires: 'Expires',
                sum: 'Amount',
                currency: 'Freespin'
            }));
        });
    });

    $('[data-remove]').on('click', function() {
        $.request('/admin/promocode/remove', {
            'id': $(this).attr('data-remove')
        }).then(function() {
            window.location.reload();
        });
    });
});
