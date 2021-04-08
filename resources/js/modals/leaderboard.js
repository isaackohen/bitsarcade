var currency = 'usd';

function updateLeaderCurrency() {
	$('.leader-stage').uiBlocker();
	$.allLeaderboard();
    setTimeout(function() {
        $.each($('i'), (i, e) => $.transformIcon($(e)));
    }, 100);
}

$.leaderboard = function() {
	$.modal('leaderboard').then((e) => {
        $('.leader-stage').uiBlocker();
        $.allLeaderboard();
    });
};

$.todayLeaderboard = function() {
		$('.leader-stage').uiBlocker();
        $.get('/modals.leaderboard/today?currency=' + currency, function(response) {
            $('.leader-stage').html(response);
			$('.leader-stage').uiBlocker(false);
			$.updateLeaderSelector();
        });
};

$.allLeaderboard = function() {
		$('.leader-stage').uiBlocker();
        $.get('/modals.leaderboard/all?currency=' + currency, function(response) {
            $('.leader-stage').html(response);
			$('.leader-stage').uiBlocker(false);
			$.updateLeaderSelector();
        });
};

$.updateLeaderSelector = function() {
    const formatIcon = function(icon) {
        return $(`<span><i class="${$(icon.element).data('icon')}" style="color: ${$(icon.element).data('style')}"></i> ${icon.text}</span>`)
    };

    $(`#currency-selector-leader`).select2({
        templateSelection: formatIcon,
        templateResult: formatIcon,
        minimumResultsForSearch: -1,
        allowHtml: true
    });

    $('#currency-selector-leader').on('select2:selecting', function(e) {
		currency = e.params.args.data.id;
        updateLeaderCurrency();
    });

    $(`#currency-selector-leader`).val(currency).trigger('change');
};