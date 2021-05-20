<!DOCTYPE html>
<html lang="en" class="theme--{{ $_COOKIE['theme'] ?? 'dark' }}">
    <head>
        <title>{{ \App\Settings::where('name', 'platform_name')->first()->value }}</title>
        <link href="/css/webfonts.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="/img/logo/ico.png"/>
        <meta charset="utf-8">
        
        <noscript><meta http-equiv="refresh" content="0; /no_js"></noscript>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ \App\Settings::where('name', 'platform_description')->first()->value }}">
        <meta property="og:description" content="{{ \App\Settings::where('name', 'platform_description')->first()->value }}" />
        <meta property="og:image" content="{{ asset('/img/logo/thumb.png') }}" />
        <meta property="og:image:secure_url" content="{{ asset('/img/logo/thumb.png') }}" />
        <meta property="og:image:type" content="image/svg+xml" />
        <meta property="og:image:width" content="295" />
        <meta property="og:image:height" content="295" />
        <meta property="og:site_name" content="{{ \App\Settings::where('name', 'platform_name')->first()->value }}" />
        @if(env('APP_DEBUG'))
        <meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
        <meta http-equiv="Pragma" content="no-cache">
        @endif
        <link rel="preload" href="{{ mix('/js/app.js') }}" as="script">
        <link rel="preload" href="{{ mix('/css/app.css') }}" as="style">
        <link rel="preload" href="{{ mix('/css/loader.css') }}" as="style">
        <link rel="preload" href="{{ $hash('/fonts/fa-duotone-900.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="{{ $hash('/fonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="{{ $hash('/fonts/fa-regular-400.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="{{ $hash('/fonts/fa-light-300.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="{{ $hash('/fonts/fa-brands-400.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('/css/loader.css') }}">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <link rel="manifest" href="/manifest.json">
        <script src="{{ mix('/js/bootstrap.js') }}" type="text/javascript" defer></script>
        <script>
        window._locale = '{{ app()->getLocale() }}';
        window._translations = {!! cache('translations') !!};
        window._mixManifest = {!! file_get_contents(public_path('mix-manifest.json')) !!}
        @php
        $currency = [];
        foreach(\App\Currency\Currency::all() as $c) $currency = array_merge($currency, [
        $c->id() => [
        'id' => $c->id(),
        'name' => $c->name(),
        'icon' => $c->icon(),
        'style' => $c->style(),
        'requiredConfirmations' => intval($c->option('confirmations')),
        'withdrawFee' => floatval($c->option('fee')),
        'minimalWithdraw' => floatval($c->option('withdraw')),
        'bonusWheel' => floatval($c->option('bonus_wheel')),
        'referralBonusWheel' => floatval($c->option('referral_bonus_wheel')),
        'investMin' => floatval($c->option('min_invest')),
        'highRollerRequirement' => floatval($c->option('high_roller_requirement')),
        'min_bet' => $c->option('min_bet'),
        'max_bet' => $c->option('max_bet')
        ]
        ]);
        @endphp
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'userId' => auth()->guest() ? null : auth()->user()->id,
        'userName' => auth()->guest() ? null : auth()->user()->name,
        'vapidPublicKey' => config('webpush.vapid.public_key'),
        'access' => auth()->guest() ? 'user' : auth()->user()->access,
        'currency' => $currency]) !!};
        window.currencies = {!! json_encode([
        'btc' => ['dollar' => \App\Http\Controllers\Api\WalletController::rateDollarBtc(), 'euro' => \App\Http\Controllers\Api\WalletController::rateDollarBtcEur()],
        'bch' => ['dollar' => \App\Http\Controllers\Api\WalletController::rateDollarBtcCash(), 'euro' => \App\Http\Controllers\Api\WalletController::rateDollarBtcCashEur()],
        'eth' => ['dollar' => \App\Http\Controllers\Api\WalletController::rateDollarEth(), 'euro' => \App\Http\Controllers\Api\WalletController::rateDollarEthEur()],
        'xmr' => ['dollar' => \App\Http\Controllers\Api\WalletController::rateDollarXmr(), 'euro' => \App\Http\Controllers\Api\WalletController::rateDollarXmrEur()],
        'ltc' => ['dollar' => \App\Http\Controllers\Api\WalletController::rateDollarLtc(), 'euro' => \App\Http\Controllers\Api\WalletController::rateDollarLtcEur()],
        'iota' => ['dollar' => \App\Http\Controllers\Api\WalletController::rateDollarIota(), 'euro' => \App\Http\Controllers\Api\WalletController::rateDollarIotaEur()],
        'doge' => ['dollar' => \App\Http\Controllers\Api\WalletController::rateDollarDoge(), 'euro' => \App\Http\Controllers\Api\WalletController::rateDollarDogeEur()],
        'trx' => ['dollar' => \App\Http\Controllers\Api\WalletController::rateDollarTron(), 'euro' => \App\Http\Controllers\Api\WalletController::rateDollarTronEur()]
        ]) !!};
        </script>
        {!! NoCaptcha::renderJs() !!}
    </head>
    <body>

        <div class="pageLoader" style="background: radial-gradient(circle, rgba(20,26,40,1) 0%, rgba(20,26,40,1) 63%, rgba(6,8,13,1) 100%) !important;">

            <div class="loader">
                <div></div>
            </div>
            <div class="error" style="display: none"></div>
        </div>

    
    <div class="wrapper">
        <header>
            <div class="fixed">
                <div class="menu">
                    <button
                    data-mdb-toggle="sidenav"
                    data-mdb-target="#sidenav-1"
                    class="btn transparent"
                    aria-controls="#sidenav-1"
                    aria-haspopup="true"
                    style="    color: #4278f2 !important;
                    background: transparent !important;
                    font-size: 1.2rem;
                    padding: 1px;
                    text-shadow: 1px 1px black;
                    margin-top: 5px;
                    box-shadow: none !important;"
                    >
                    <span class="dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-bars"></i>
                    </span>
                    </button>
                </div>
                <a href="/"><div class="smalllogo"></div></a>
                <a onclick="redirect('/')"><div class="logo"></div></a>
                @if(!auth()->guest())
                <div class="wallet">
                    <div class="wallet-switcher">
                        @foreach(\App\Currency\Currency::all() as $currency)
                        <div class="option" data-set-currency="{{ $currency->id() }}">
                            <div class="wallet-switcher-icon">
                                <i class="{{ $currency->icon() }}" style="color: {{ $currency->style() }}"></i>
                            </div>
                            <div class="wallet-switcher-content">
                                <div data-currency-value="{{ $currency->id() }}">{{ number_format(auth()->user()->balance($currency)->get(), 8, '.', '') }}</div>
                                <div data-demo-currency-value="{{ $currency->id() }}">{{ number_format(auth()->user()->balance($currency)->demo()->get(), 8, '.', '') }}</div>
                                <span>
                                    {{ $currency->name() }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                        <div class="option select-option">
                            <div class="wallet-switcher-icon">
                                <i class="fas fa-btc-icon"></i>
                            </div>
                            <div class="wallet-switcher-content">
                                {{ __('general.unit') }}:
                                <select id="unitChanger">
                                    <option value="disabled" {{ ($_COOKIE['unit'] ?? 'none') == 'disabled' ? 'selected' : '' }}>Disabled</option>
                                    <option value="usd" {{ ($_COOKIE['unit'] ?? 'usd') == 'usd' ? 'selected' : '' }}>USD</option>
                                    <option value="euro" {{ ($_COOKIE['unit'] ?? 'euro') == 'euro' ? 'selected' : '' }}>EURO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="btn btn-secondary icon">
                        <i data-selected-currency></i>
                        <i class="fal fa-angle-down"></i>
                    </div>
                    <div class="balance"></div>
                    <div class="btn btn-primary btn-rounded wallet-open p-2" style="z-index: 5;margin-top: 1px; margin-bottom: 1px; text-shadow: 0.9px 0.9px #363d42; border-top-left-radius: 0px; border-bottom-left-radius: 0px;"></div>
                </div>
                @endif
                <div class="right">
                    @if(auth()->guest())
                    <button class="btn btn-primary m-1" onclick="$.register()">{{ __('general.auth.register') }}</button>
                    <button class="btn btn-secondary m-1" onclick="$.auth()">{{ __('general.auth.login') }}</button>
                    @else
                    <div class="action d-none d-sm-block" style="margin-right: 5px; font-size: 17px; color: #bff2ff;"  onclick="redirect('/user/{{ auth()->user()->_id }}')">
                        <i class="fad fa-user-circle"></i>
                    </div>
                    <div style="cursor: pointer; margin-right: 5px; color: #bff2ff;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>
                    <div class="action" style="color: #bff2ff;" data-notification-view onclick="$.displayNotifications()">
                        <i class="fas fa-bell"></i>
                    </div>
                    @endif
                </div>
            </div>
        </header>

        <div class="pageContent" style="opacity: 0;">
            {!! $page !!}
        </div>
        
        <div class="container-lg">
            <div class="collapse-sidebar">
                <nav id="sidenav-1" class="sidenav" data-mdb-hidden="true" data-mdb-mode="over" data-mdb-content="#content">
                    <ul class="sidenav-menu"> 
                    <li class="sidenav-item mt-4 mb-0"> <a class="sidenav-link"
                        ><i style="color: #5cb9ff" class="fad fa-user-circle me-3"></i><span style="font-family: 'Proxima Nova Semi Bd'">@if(auth()->guest())Account @else {{ auth()->user()->name }} @endif</span></a>
                        <ul class="sidenav-collapse">
                            @if(auth()->guest())
                            <li class="sidenav-item">
                                <a onclick="$.auth()" class="sidenav-link">Login</a>
                            </li>
                            <li class="sidenav-item">
                                <a onclick="$.register()" class="sidenav-link">Register</a>
                            </li>
                            @else
                            <li class="sidenav-item">
                                <a onclick="$.wallet()" class="sidenav-link">Deposit</a>
                            </li>
                            <li class="sidenav-item">
                                <a onclick="$.wallet()" class="sidenav-link">Withdraw</a>
                            </li>
                            <li class="sidenav-item">
                                <a onclick="$.vip()" class="sidenav-link">Your Loyalty Progress</a>
                            </li>
                            <li class="sidenav-item">
                                <a href='/user/{{ auth()->user()->_id }}' class="sidenav-link">Settings</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    <li class="sidenav-item mt-2 mb-0">
                        <a class="sidenav-link "
                            ><i  style="color: #5cb9ff" class="fad fa-game-board me-3"></i><span style="font-family: 'Proxima Nova Semi Bd'">Games</span></a>
                            <ul class="sidenav-collapse">
                                <li class="sidenav-item mt-2 mb-0" style="padding-left: 0px !important;">
                                    <a class="sidenav-link" style="padding-left: 1.5rem !important;"
                                        ><i  style="color: #0fd560" class="fad fa-compress-arrows-alt me-3"></i><span style="font-family: 'Proxima Nova Semi Bd'">Provably Fair</span></a>
                                        <ul class="sidenav-collapse">
                                            @foreach(\App\Games\Kernel\Game::list() as $game)
                                            @if($game->isDisabled()) @continue @endif
                                            @if($game->metadata()->id() == "slotmachine") @continue @endif
                                            @if($game->metadata()->id() == "evoplay") @continue @endif
                                            <li class="sidenav-item">
                                                <a onclick="redirect('/game/{{ $game->metadata()->id() }}')" class="sidenav-link"><i class="{{ $game->metadata()->icon() }} me-3"></i> {{ $game->metadata()->name() }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="sidenav-item mt-2 mb-0"> <a  style="padding-left: 1.5rem !important;" onclick="redirect('/gamelist')" class="sidenav-link">
                                        <i style="color: #0fd560;" class="fad fa-abacus me-3"></i><span>Slots</span></a>
                                    </li>

                                    <li class="sidenav-item mt-2 mb-0"> <a style="padding-left: 1.5rem !important;"onclick="$.displaySearchBar()" class="sidenav-link">
                                        <i style="color: #0fd560;" class="fas fa-search me-3"></i><span>Search</span></a>
                                    </li>
                                </ul>
                            </li>

                             <li class="sidenav-item mt-2 mb-0"> <a  onclick="redirect('/bonus/')" class="sidenav-link">
                                        <i style="color: #0fd560;" class="fad fa-gift me-3"></i><span>Bonus & Freebies</span></a>
                             </li>              
                            <li class="sidenav-item mt-2 mb-0"> <a  onclick="redirect('/earn')" class="sidenav-link">
                                <i style="color: #0fd560;" class="fad fa-money-bill-alt me-3"></i><span>Earn Wall</span></a>
                            </li>
                            <li class="sidenav-item mt-2 mb-0"> <a  onclick="$.races()" class="sidenav-link">
                                <i style="color: #0fd560;" class="fas fa-comet me-3"></i><span>Races</span></a>
                            </li>
                            <li class="sidenav-item mt-2 mb-0"> <a  onclick="$.leaderboard()" class="sidenav-link">
                                <i style="color: #0fd560;" class="fas fa-trophy-alt me-3"></i><span>Leaderboard</span></a>
                            </li>
                            <li class="sidenav-item mt-2 mb-0"> <a onclick="redirect('/help')" class="sidenav-link">
                                <i  style="color: #5cb9ff" class="fad fa-question-circle me-3"></i><span style="font-family: 'Proxima Nova Semi Bd'">Help</span></a>
                            </li>
 
                                @if(!auth()->guest() && auth()->user()->access == 'admin')
                                <ul class="sidenav-menu"> <li class="sidenav-item mt-2 mb-0"> <a class="sidenav-link" onclick="window.location.href='/admin'">
                                    <i class="fad fa-unlock me-2"></i><span>Admin</span></a>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="live">
                        <div class="header">
                            <span class="liveAnimation">Live</span>
                            <div class="tabs">
                                @if(!auth()->guest()) <div class="tab" data-live-tab="mine">{{ __('general.bets.mine') }}</div> @endif
                                <div class="tab active" id="allBetsTab" data-live-tab="all">{{ __('general.bets.all') }}</div>
                                <div class="tab" data-live-tab="lucky_wins">{{ __('general.bets.lucky_wins') }}</div>
                            </div>
                            <select id="liveTableEntries">
                                <option value="10" {{ ($_COOKIE['show'] ?? 10) == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ ($_COOKIE['show'] ?? 10) == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ ($_COOKIE['show'] ?? 10) == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>
                        <div class="live_table_container"></div>
                    </div>
                </div>
                <footer class="text-center text-white">
                    <div class="container p-4">
                        <section class="mb-4">
                            <a class="btn btn-outline-light btn-floating m-1" href="{{ \App\Settings::where('name', 'discord_invite_link')->first()->value }}" target="_blank" role="button"
                                ><i class="fab fa-discord"></i
                            ></a>
                            <a class="btn btn-outline-light btn-floating m-1" href="{{ \App\Settings::where('name', 'twitter_link')->first()->value }}" target="_blank" role="button"
                                ><i class="fab fa-twitter"></i
                            ></a>
                            <a href="{{ \App\Settings::where('name', 'telegram_link')->first()->value }}" target="_blank" class="btn btn-outline-light btn-floating m-1" role="button"
                                ><i class="fab fa-telegram"></i
                            ></a>
                            <section class="">
                                <form action="">
                                </form>
                            </section>
                            <section class="mb-1">
                                <p>
                                    {{ \App\Settings::where('name', 'platform_footer')->first()->value }}
                                    <br>{{ \App\Settings::where('name', 'platform_footer_2')->first()->value }}
                                    <br>
                                    <a href="/terms/terms_and_conditions">{{ __('general.footer.terms_and_conditions') }}</a> - <a href="/fairness">{{ __('general.footer.fairness') }}</a> - <a href="/partner">Partner Program</a> - 

                                </p>
                            </section>
                        </div>
                        <div class="footer-bottom text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                            <img src="/img/logo/logo_bits_footer.png" alt="{{ \App\Settings::where('name', 'platform_name')->first()->value }} Logo">
                            <a href="https://secure.ecogra.biz/validator/operator/validate=bitsarcade.com&amp;seal_id=1626f5bc489211b07f8c75b57e41e9f1e78a5a8426e197e0c6437da9ebfaea4c624094439fad0cfdd61f49fc5924bca9&amp;stamp=d4f3109f8d3bce51ca70ded5e25fd3f7/" target="_blank"><img width="65px" height="60px" src="/img/misc/basic-large-validseal.png" alt="eCOGRA License Validation"></a>
                            <a href="https://www.bitsarcade.com/documents/RNG_Certificate_BITSARCADE_UK27February2021.pdf" target="_blank"><img width="45px" height="60px" src="/images/itechlabs.png" alt="RNG Certificate" style=""></a>
                        </div>
                    </footer>
                </div>
                <div class="chat">
                    <div class="fixed">
                        <div class="chat-input-hint chatCommands" style="display: none"></div>
                        <div data-user-tag class="chat-input-hint" style="display: none">
                            <div class="hint-content"></div>
                            <div class="hint-footer">
                                {!! __('general.chat_at') !!}
                            </div>
                        </div>
                        <div class="messages"></div>
                        <div class="message-send">
                            @if(auth()->guest())
                            <div class="message-auth-overlay">
                                <button class="btn btn-block btn-secondary" onclick="$.auth()">{{ __('general.auth.login') }}</button>
                            </div>
                            @elseif(auth()->user()->mute != null && !auth()->user()->mute->isPast())
                            <div class="message-auth-overlay" style="opacity: 1 !important; text-align: center; font-size: 0.8em;">
                                {{ __('general.error.muted', [ 'time' => auth()->user()->mute ]) }}
                            </div>
                            @endif
                            <div class="d-flex w-100">
                                <div class="column">
                                    @if(!auth()->guest())
                                    <div class="column-icon" data-notification-view onclick="$.displayNotifications()">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    @endif
                                    @if(!auth()->guest() && auth()->user()->access == 'admin')
                                    <div class="column-icon" id="chatCommandsToggle">
                                        <i class="fal fa-slash fa-rotate-90"></i>
                                    </div>
                                    @endif
                                    <textarea onkeydown="if(event.keyCode === 13) { $.sendChatMessage('.text-message'); return false; }" class="text-message" placeholder="{{ __('general.chat.enter_message') }}"></textarea>
                                </div>
                                <div class="column">
                                    <div class="column-icon">
                                        @if(!auth()->guest())
                                        <div class="emoji-container">
                                            <div class="content" data-fill-emoji-target></div>
                                            <div class="emoji-footer">
                                                <div class="content">
                                                    <div class="emoji-category" onclick="$.unicodeEmojiInit()">
                                                        <i class="fad fa-smile"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <i class="fad fa-smile" id="emoji-container-toggle" onclick="$.unicodeEmojiInit(); $('.emoji-container').toggleClass('active')"></i>
                                    </div>
                                    <div class="column-icon" onclick="$.sendChatMessage('.text-message')" id="sendChatMessage"><i class="fad fa-external-link-square"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="draggableWindow">
                    <div class="head">
                        {{ __('general.profit_monitoring.title') }}
                        <i class="far fa-redo-alt"></i>
                        <i class="fal fa-times"></i>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-6">
                                {{ __('general.profit_monitoring.wins') }}
                                <span id="wins" class="float-right text-success"></span>
                            </div>
                            <div class="col-6">
                                {{ __('general.profit_monitoring.losses') }}
                                <span id="losses" class="float-right text-danger"></span>
                            </div>
                        </div>
                        <div class="profit-monitor-chart"></div>
                        <div class="row">
                            <div class="col-6">
                                <div>{{ __('general.profit_monitoring.wager') }}</div>
                                <span id="wager"></span>
                            </div>
                            <div class="col-6">
                                <div>{{ __('general.profit_monitoring.profit') }}</div>
                                <span id="profit"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-extended">
                    <div class="control" data-page-trigger="'/help'" data-toggle-class="active" onclick="redirect('/help')">
                        <i class="fas fa-question-circle"></i>
                        <div>{{ __('general.head.help') }}</div>
                    </div>
                    <div class="control" @if(Auth::guest()) onclick="$.auth()" @else data-page-trigger="'/earn'" @endif data-toggle-class="active" onclick="redirect('/earn')">
                        <i class="far fa-money-bill-wave"></i>
                        <div>Earn Wall</div>
                    </div>
                    <div class="control" onclick="$.races()">
                        <i class="fas fa-comet"></i>
                        <div>Races</div>
                    </div>
                    <div class="control" onclick="$.leaderboard()">
                        <i class="fas fa-trophy-alt"></i>
                        <div>Leaderboard</div>
                    </div>
                </div>
                <div class="mobile-menu-games">
                    <div class="mobile-menu-games-container">
                        <div class="game" onclick="redirect('/'); $('.mobile-menu-games').slideToggle('fast'); $('#mobile-games-angle').toggleClass('fa-rotate-180')">
                            <div class="icon">
                                <i class="fas fa-spade"></i>
                            </div>
                            <div class="name">
                                {{ __('general.head.index') }}
                            </div>
                        </div>
                        @foreach(\App\Games\Kernel\Game::list() as $game)
                        @if($game->isDisabled()) @continue @endif
                        <div class="game" onclick="redirect('/game/{{ $game->metadata()->id() }}'); $('.mobile-menu-games').slideToggle('fast'); $('#mobile-games-angle').toggleClass('fa-rotate-180')">
                            <div class="icon">
                                <i class="{{ $game->metadata()->icon() }}"></i>
                            </div>
                            <div class="name">
                                {{ $game->metadata()->name() }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="floatingButtons">
                    <div class="floatingButton" data-chat-toggle>
                    <svg><use href="#chat"></use></svg>
                </div>
            </div>
            <div class="mobile-menu">
                <div class="control" data-page-trigger="'/','/index'" data-toggle-class="active" onclick="$('.mobile-menu-games').slideToggle('fast'); $('#mobile-games-angle').toggleClass('fa-rotate-180')">
                    <i class="fas fa-spade"></i>
                    <div><i class="fal fa-angle-up" style="margin-right: 1px" id="mobile-games-angle"></i> {{ __('general.head.games') }}</div>
                </div>
                <div class="control" onclick="$.swapChat()">
                    <i class="fad fa-comments"></i>
                    <div>{{ __('general.head.chat') }}</div>
                </div>
                <div class="control" data-page-trigger="'/bonus'" data-toggle-class="active" onclick="redirect('/bonus')">
                    <i class="fad fa-coins"></i>
                    <div>{{ __('general.head.bonus_short') }}</div>
                </div>
                <div class="control" onclick="$('.mobile-menu-extended').slideToggle('fast', function() { if($(this).is(':visible')) $(this).css('display', 'flex'); }); $(this).find('svg').toggleClass('fa-rotate-180');">
                    <i class="fal fa-angle-up"></i>
                </div>
            </div>
            <div class="modal-wrapper">
                <div class="modal-overlay"></div>
            </div>
            <div class="notifications">
                <i class="fal fa-times" data-close-notifications></i>
                <div class="title">{{ __('general.notifications.title') }}</div>
                <div class="notifications-content os-host-flexbox"></div>
            </div>
            <div class="notifications-overlay"></div>
            <div class="searchbar">
                <i class="fal fa-times" data-close-searchbar></i>
                <div class="title">{{ __('general.searchbar') }}</div>
                <div class="searchbar-content os-host-flexbox" style="color: white;">
                    <input type="text" id="searchbar" placeholder="Search game or provider..">
                    <div class="our-games" style="background: transparent !important;" id="searchbar_result">
                    </div>
                </div>
            </div>
            <div class="searchbar-overlay"></div>
     @if(!auth()->guest())
            <script>
            window.intercomSettings = {
            app_id: "{{ \App\Settings::where('name', 'intercom_id')->first()->value }}",
            custom_launcher_selector:'#intercomopenlink',
            user_id: <?php echo json_encode(auth()->user()->id) ?>,
            name: <?php echo json_encode(auth()->user()->name) ?>,
            email: <?php echo json_encode(auth()->user()->email) ?>,
            register_ip: <?php echo json_encode(auth()->user()->register_ip) ?>,
            login_ip: <?php echo json_encode(auth()->user()->login_ip) ?>,
            accounts_registerip: <?php echo json_encode(\App\User::where('register_ip', auth()->user()->register_ip)->count()) ?>,
            accounts_loginip: <?php echo json_encode(\App\User::where('login_ip', auth()->user()->login_ip)->count()) ?>,
            accounts_registerhash: <?php echo json_encode(\App\User::where('register_multiaccount_hash', auth()->user()->register_multiaccount_hash)->count()) ?>,
            accounts_loginhash: <?php echo json_encode(\App\User::where('login_multiaccount_hash', auth()->user()->login_multiaccount_hash)->count()) ?>,
            created_at: <?php echo json_encode(auth()->user()->created_at) ?>,
            vipLevel: <?php echo json_encode(auth()->user()->vipLevel()) ?>,
            deposits: <?php echo json_encode(\App\Invoice::where('user', auth()->user()->_id)->where('status', 1)->where('ledger', '!=','Offerwall Credit')->count()) ?>,
            freegames: <?php echo json_encode(auth()->user()->freegames) ?>
            };
            </script>
            <script>
            // We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/{{ \App\Settings::where('name', 'intercom_id')->first()->value }}'
            (function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/{{ \App\Settings::where('name', 'intercom_id')->first()->value }}';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
            </script>
            @endif
        </body>
    </html>