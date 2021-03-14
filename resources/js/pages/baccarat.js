$.game('baccarat', function(container, overviewData) {
    $(container).append(`
        <i class="fas fa-baccarat-ribbon"></i>
        <div class="deck">
            <div><div></div></div>
            <div><div></div></div>
            <div><div></div></div>
            <div><div></div></div>
        </div>
    `);

    if($.isOverview(overviewData)) {

    }
}, function() {
    return {

    };
}, function(response) {

}, function(error) {
    $.error($.lang('general.error.unknown_error', {'code': error}));
});

$.on('/game/baccarat', function() {
    $.render('baccarat');

    $.sidebar(function(component) {
        component.chips(function(v) {

        });

        component.play();
        component.autoBets();
        component.footer().help().sound().stats();
    });
}, ['/css/pages/baccarat.css']);
