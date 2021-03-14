const debug = false;
const width = 800, height = 600;

const in_progress_color = '#ffcc00', crash_color = '#ff1f44';
let crashed = false, placedBetThisRound = false, betValue, interval = null;

class Ruler {

    constructor(ctx, x1, y1, x2, y2, isDebug) {
        ctx.beginPath();
        ctx.lineWidth = 5;
        ctx.strokeStyle = isDebug ? 'yellow' : ($.currentTheme() === 'dark' ? 'rgba(255, 255, 255, 0.05)' : 'rgba(0, 0, 0, 0.05)');
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.stroke();

        this.ctx = ctx;
    }

    addText(label, x, y, align = 'center') {
        const textSize = 15;
        this.ctx.fillStyle = $.currentTheme() === 'dark' ? 'rgba(255, 255, 255, 0.25)' : 'rgba(0, 0, 0, 0.5)';
        this.ctx.textAlign = align;
        this.ctx.font = `${textSize}px Open Sans`;
        this.ctx.fillText(label, x, y + textSize);
    }

}

let startTimestamp = 0, currentMultiplier = 1, autoCashout = 2;

function redrawCanvas() {
    const textSize = 70;
    ctx.fillStyle = $.currentTheme() === 'dark' ? 'white' : 'black';
    ctx.font = `${textSize}px Open Sans`;
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText(`${crashed ? `${$.lang('general.crash')} @ `: ''}${parseFloat(currentMultiplier).toFixed(2)}x`, width / 2, height / 2);

    // Multiplier - Y axis
    const rulerY = new Ruler(ctx, 50, 50, 50, height - 50);
    // Timeline   - X axis
    const rulerX = new Ruler(ctx, 48, height - 50, width - 50, height - 50);

    const secondsRunning = startTimestamp === 0 || crashed || start == null ? 0 : parseInt((+new Date() / 1000) - startTimestamp);
    const timeOffset = secondsRunning < 10 ? 0 : secondsRunning - 10;
    const offset = 30;

    const multiplierOffset = function(num, i) {
        return secondsRunning < 10 ? num : parseFloat(currentMultiplier) / i;
    };

    rulerY.addText(`${(multiplierOffset(2.5, 1)).toFixed(1)}x`, 50 / 2, 50);
    rulerY.addText(`${(multiplierOffset(2.2, 2)).toFixed(1)}x`, 50 / 2, 50 + (((height - 50 + (offset / 2)) / 6)));
    rulerY.addText(`${(multiplierOffset(1.9, 3)).toFixed(1)}x`, 50 / 2, 50 + (((height - 50 + (offset / 2)) / 6) * 2));
    rulerY.addText(`${(multiplierOffset(1.6, 4)).toFixed(1)}x`, 50 / 2, 50 + (((height - 50 + (offset / 2)) / 6) * 3));
    rulerY.addText(`${(multiplierOffset(1.3, 5)).toFixed(1)}x`, 50 / 2, 50 + (((height - 50 + (offset / 2)) / 6) * 4));
    rulerY.addText(`${(multiplierOffset(1.0, 6)).toFixed(1)}x`, 50 / 2, 50 + offset + (((height - 50 - (offset / 2)) / 6) * 5));

    rulerX.addText(`${2 + timeOffset}s`, (50 / 2) + (((width - 50 - (offset / 2)) / 5)), height - (50 - 10), 'right');
    rulerX.addText(`${4 + timeOffset}s`, (50 / 2) + (((width - 50 - (offset / 2)) / 5) * 2), height - (50 - 10), 'right');
    rulerX.addText(`${6 + timeOffset}s`, (50 / 2) + (((width - 50 - (offset / 2)) / 5) * 3), height - (50 - 10), 'right');
    rulerX.addText(`${8 + timeOffset}s`, (50 / 2) + (((width - 50 - (offset / 2)) / 5) * 4), height - (50 - 10), 'right');
    rulerX.addText(`${10 + timeOffset}s`, (50 / 2) + (((width - 50 - (offset / 2)) / 5) * 5), height - (50 - 10), 'right');

    if(debug) {
        new Ruler(ctx, 50, 50, width - 50, 50, true);
        new Ruler(ctx, width - 50, 50, width - 50, height - 50, true);
    }
}

function clear() {
    ctx.clearRect(0, 0, width, height);
}

function reset() {
    clear();
    redrawCanvas();
    drawLineCircle(50, height - 50);
}

function redraw() {
    if(!window.location.pathname.includes('crash')) return;
    ctx = $('.game-content-crash canvas')[0].getContext('2d');
    reset();
}

$(document).on('page:themeChange', redraw);

function cashout(name) {
    let e = $(`<div class="cashout">${name}</div>`);
    $('.game-content-crash').append(e);
    e.css({ 'top': '60px', 'opacity': 1 }).animate({ top: 20, opacity: 0 }, 2000, function() {
        e.remove();
    });
}

$.game('crash', function(container, overviewData) {
    if(!$.isOverview(overviewData)) {
        container.append(`<div class="crashCustomHistory"></div>`);
        container.append(`<canvas width="800" height="600"></canvas><div class="d-none" id="animate-number-wrapper"></div>`);
        ctx = container.find('canvas')[0].getContext('2d');

        let autobetTake = null;
        $.extendedAutoBetHandler(function(take) {
            autobetTake = take;
        });

        reset();

        const updateMultiplier = function() {
            if($.currentBettingType() === 'manual') $('.play-button').toggleClass('disabled', false).html($.lang('general.take', { value: (betValue * parseFloat(currentMultiplier)).toFixed(8), icon: window.Laravel.currency[$.currency()].icon}));
        };

        animatePathDrawing(50, height - 50, 350, height - 50, width - 50, 50, 10000);

        const startGame = function() {
            start = null;
            latestProgress = 0;
            crashed = false;

            if(!placedBetThisRound) if($.currentBettingType() === 'manual') $('.play-button').toggleClass('disabled', true);
            else updateMultiplier();

            function nextMultiplier() {
                let timeInMilliseconds = 0, simulation = 1, suS = 0, diffS = (+new Date() / 1000) - startTimestamp;

                while(timeInMilliseconds / 1000 < diffS) {
                    simulation += 0.05 / 15 + suS;
                    timeInMilliseconds += 2000 / 15 / 3;
                    if(simulation >= 5.5) {
                        suS += 0.05 / 15;
                        timeInMilliseconds += 4000 / 15 / 3;
                    }
                }

                //console.log(`sim ${simulation}`, `tMS ${timeInMilliseconds}`, `diffS ${diffS}`, `suS ${suS}`);
                currentMultiplier = simulation.toFixed(2);
                if(currentMultiplier > 350) {
                    startTimestamp = +new Date();
                    currentMultiplier = 1;
                }

                if(placedBetThisRound) {
                    updateMultiplier();
                    if(parseFloat(currentMultiplier) >= autoCashout) {
                        if($.currentBettingType() === 'manual') $('.play-button').click();
                        else autobetTake();
                    }

                    $('.play-button').removeClass('disabled');
                }
            }

            interval = setInterval(function() {
                if(!window.location.pathname.includes('/crash')) return;

                if(crashed) {
                    clearInterval(interval);
                    return;
                }
                nextMultiplier();
            }, 66);
        };

        if($.currentBettingType() === 'manual') $('.play-button').addClass('disabled');
        if($.multipliers()[0] !== '-1') {
            startTimestamp = parseInt($.multipliers()[0]);
            startGame();
        } else {
            setRoundTimer(3, function () {
                startTimestamp = +new Date() / 1000;
                startGame();
            });
        }

        const hex = {
            0: ['#ffc000', '#997300'],
            1: ['#ffa808', '#a16800'],
            2: ['#ffa808', '#a95b00'],
            3: ['#ff9010', '#a95b00'],
            4: ['#ff7818', '#914209'],
            5: ['#ff6020', '#b93500'],
            6: ['#ff4827', '#c01d00'],
            7: ['#ff302f', '#c80100'],
            8: ['#ff1837', '#91071c'],
            9: ['#ff003f', '#990026']
        };

        _.forEach($.multipliers()[1], function(m) {
            let color = hex[0];
            if(parseFloat(m) > 1) color = hex[1];
            if(parseFloat(m) > 2) color = hex[2];
            if(parseFloat(m) > 3) color = hex[3];
            if(parseFloat(m) > 4) color = hex[4];
            if(parseFloat(m) > 5) color = hex[5];
            if(parseFloat(m) > 7) color = hex[6];
            if(parseFloat(m) > 10) color = hex[7];
            if(parseFloat(m) > 100) color = hex[8];
            if(parseFloat(m) > 250) color = hex[9];

            $('.crashCustomHistory').append(`<div class="crashCustomHistoryElement" style="background: ${color[0]}; border-bottom: 1px solid ${color[1]}">${parseFloat(m).toFixed(2)+'x'}</div>`);
        });

        if(window.crashListenerRegistered !== true) {
            window.crashListenerRegistered = true;
            window.Echo.channel('laravel_database_Everyone').listen('CrashGameBet', function (e) {
                if (!window.location.pathname.includes('/crash')) return;

                $.multiplayerBets().add(e.user, e.game);
            });

            window.Echo.channel('laravel_database_Everyone').listen('CrashTakeBet', function (e) {
                if (!window.location.pathname.includes('/crash')) return;
                cashout(e.user_name);
            });

            window.Echo.channel('laravel_database_Everyone').listen('CrashFinishGame', function (e) {
                if (!window.location.pathname.includes('/crash')) return;

                $.finishExtended(false);
                if($.currentBettingType() === 'manual') $('.play-button').addClass('disabled');

                crashed = true;
                start = null;

                let color = hex[0];
                if(parseFloat(currentMultiplier) > 1) color = hex[1];
                if(parseFloat(currentMultiplier) > 2) color = hex[2];
                if(parseFloat(currentMultiplier) > 3) color = hex[3];
                if(parseFloat(currentMultiplier) > 4) color = hex[4];
                if(parseFloat(currentMultiplier) > 5) color = hex[5];
                if(parseFloat(currentMultiplier) > 7) color = hex[6];
                if(parseFloat(currentMultiplier) > 10) color = hex[7];
                if(parseFloat(currentMultiplier) > 100) color = hex[8];
                if(parseFloat(currentMultiplier) > 250) color = hex[9];

                const el = $(`<div class="crashCustomHistoryElement" style="background: ${color[0]}; border-bottom: 1px solid ${color[1]}">${parseFloat(currentMultiplier).toFixed(2)+'x'}</div>`);
                $('.crashCustomHistory').prepend(el);
                el.hide().slideDown('fast');
                $('.crashCustomHistoryElement:nth-child(30)').remove();

                if($.currentBettingType() === 'auto' && $.autoBetActive()) $.autoBetNext();

                setTimeout(function () {
                    $.multiplayerBets().clear();
                    reset($('.game-content-crash canvas')[0].getContext('2d'));
                }, 5000);
            });

            window.Echo.channel('laravel_database_Everyone').listen('CrashGameTimerStart', function () {
                if (!window.location.pathname.includes('/crash')) return;
                placedBetThisRound = false;
                $('.play-button').removeClass('disabled');
                latestProgress = 0;
                start = null;
                setRoundTimer(6, function () {
                    startTimestamp = +new Date() / 1000;
                    $('.play-button').removeClass('disabled');
                    startGame();
                });
            });
        }
    }
}, function() {
    return {
        'empty': 'data'
    };
}, function(response) {
    if(response === null || placedBetThisRound) {
        placedBetThisRound = false;
        if($.currentBettingType() === 'manual') $('.play-button').toggleClass('disabled', true).html($.lang('general.play'));
        return;
    }
    placedBetThisRound = true;
    betValue = response.wager;
    if($.currentBettingType() === 'manual') $('.play-button').addClass('disabled').html($.lang('general.wait_game_start'));
    $.blockPlayButton(false);
}, function(error) {
    $.error($.lang('general.error.unknown_error', {'code': error}));
});

const setRoundTimer = function(seconds, callback) {
    seconds *= 1000;

    $('.crash-time').hide()
        .css({'width': '100%'})
        .fadeIn('fast')
        .animate({'width': '0%'}, {duration: seconds, easing: 'linear'});

    $('.crash-time span').html(`${(seconds / 1000).toFixed(2)}s`).fadeIn('fast');
    let left = seconds, step = 100, interval = setInterval(function() {
        left -= step;
        $('.crash-time span').html(`${(left / 1000).toFixed(2)}s`);
        if(left <= 0) {
            clearInterval(interval);
            $('.crash-time span').fadeOut('fast');
        }
    }, step);

    setTimeout( function() {
        crashed = false;
        currentMultiplier = 1.0;
        callback();
    }, seconds);

    crashed = true;
    start = null;
};

$.on('/game/crash', function() {
    crashed = false;
    placedBetThisRound = false;
    betValue = null;
    startTimestamp = 0;
    currentMultiplier = 1;
    autoCashout = 2;
    start = null;
    latestProgress = 0;

    if(interval != null) {
        clearInterval(interval);
        interval = null;
    }

    $.render('crash');

    $.sidebar(function(component) {
        component.bet();
        component.history('crash');
        $.history().add(function(e) {
            e.addClass('crash-time').html(`<span style="display: none">0.00s</span>`);
        });

        component.input($.lang('general.autoStop'), function(v) {
            if(!isNaN(v) && parseFloat(v) >= 1.1 && parseFloat(v) <= 350) autoCashout = parseFloat(v);
        }, '2.00');

        component.autoBets();
        component.play();

        component.multiplayerBets();

        component.footer().help().sound().stats();
        }, function() {
			$.sidebarData().currency(($.sidebarData().bet() * $.getPriceCurrency()).toFixed(4));
    });
}, ['/css/pages/crash.css']);

/**
 * Animates bezier-curve
 *
 * @param ctx
 * @param x0        The x-coord of the start point
 * @param y0        The y-coord of the start point
 * @param x1        The x-coord of the control point
 * @param y1        The y-coord of the control point
 * @param x2        The x-coord of the end point
 * @param y2        The y-coord of the end point
 * @param duration  The duration in milliseconds
 */
let start = null, latestProgress = 0, ctx;
function animatePathDrawing(x0, y0, x1, y1, x2, y2, duration) {
    //if(window.crashLoopInitialized !== undefined) return;
    window.crashLoopInitialized = true;

    let step = function animatePathDrawingStep(timestamp) {
        if(start == null && !crashed) start = timestamp;

        let delta = timestamp - start,
            progress = Math.min(delta / duration, 1);

        if(start != null) latestProgress = progress;

        const next = function(reset) {
            if(!window.location.pathname.includes('/crash')) return;

            ctx.clearRect(0, 0, width, height);

            drawBezierSplit(x0, y0, x1, y1, x2, y2, 0, reset ? latestProgress : progress);
            if (!(latestProgress < 1)) drawLineCircle(x2, y2);
            else if((crashed || start == null) && latestProgress === 0) drawLineCircle(x0, y0);

            redrawCanvas();

            window.requestAnimationFrame(step);
        };

        next(start == null || crashed);
    };
    window.requestAnimationFrame(step);
}

function drawLineCircle(x, y) {
    ctx.beginPath();
    ctx.arc(x, y, 10, 0, 2 * Math.PI, false);
    ctx.lineWidth = 3;
    ctx.strokeWidth = 3;
    ctx.fillStyle = crashed || start == null ? crash_color : in_progress_color;
    ctx.fill();
}

/**
 * Draws a splitted bezier-curve
 *
 * @param x0        The x-coord of the start point
 * @param y0        The y-coord of the start point
 * @param x1        The x-coord of the control point
 * @param y1        The y-coord of the control point
 * @param x2        The x-coord of the end point
 * @param y2        The y-coord of the end point
 * @param t0        The start ratio of the splitted bezier from 0.0 to 1.0
 * @param t1        The start ratio of the splitted bezier from 0.0 to 1.0
 */
function drawBezierSplit(x0, y0, x1, y1, x2, y2, t0, t1) {
    ctx.beginPath();

    if(0.0 === t0 && t1 === 1.0) {
        ctx.strokeStyle = crashed || start == null ? crash_color : in_progress_color;
        ctx.moveTo(x0, y0);
        ctx.quadraticCurveTo(x1, y1, x2, y2);
    } else if(t0 !== t1) {
        let t00 = t0 * t0,
            t01 = 1.0 - t0,
            t02 = t01 * t01,
            t03 = 2.0 * t0 * t01;

        let nx0 = t02 * x0 + t03 * x1 + t00 * x2,
            ny0 = t02 * y0 + t03 * y1 + t00 * y2;

        t00 = t1 * t1;
        t01 = 1.0 - t1;
        t02 = t01 * t01;
        t03 = 2.0 * t1 * t01;

        let nx2 = t02 * x0 + t03 * x1 + t00 * x2,
            ny2 = t02 * y0 + t03 * y1 + t00 * y2;

        let nx1 = lerp ( lerp ( x0 , x1 , t0 ) , lerp ( x1 , x2 , t0 ) , t1 ),
            ny1 = lerp ( lerp ( y0 , y1 , t0 ) , lerp ( y1 , y2 , t0 ) , t1 );

        if(debug) {
            ctx.beginPath();
            ctx.strokeStyle = 'black';
            ctx.rect(nx1, ny1, 10, 10);
            ctx.stroke();
        }

        ctx.strokeStyle = crashed || start == null ? crash_color : in_progress_color;
        if((!crashed && start != null) || latestProgress > 0) drawLineCircle(nx2, ny2);

        ctx.moveTo(nx0, ny0);
        ctx.lineWidth = 6;
        ctx.quadraticCurveTo(nx1, ny1, nx2, ny2);
    }

    ctx.stroke();
    ctx.closePath();
}

/**
 * Linearly interpolates between two numbers
 */
function lerp(v0, v1, t) {
    return ( 1.0 - t ) * v0 + t * v1;
}
