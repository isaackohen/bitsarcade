<!DOCTYPE html>
<html lang="en" class="theme--{{ $_COOKIE['theme'] ?? 'dark' }}">
    <head>
        <title>BITSArcade - Crypto Gambling Platform</title>
        <link href="/css/webfonts.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="/img/logo/favicon.ico"/>
        <meta charset="utf-8">
        <noscript><meta http-equiv="refresh" content="0; /no_js"></noscript>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ __('general.head.description') }}">

        <meta property="og:description" content="{{ __('general.head.description') }}" />
        <meta property="og:image" content="{{ asset('/img/logo/logo_carousel.png') }}" />
        <meta property="og:image:secure_url" content="{{ asset('/img/logo/logo_carousel.png') }}" />
        <meta property="og:image:type" content="image/svg+xml" />
        <meta property="og:image:width" content="295" />
        <meta property="og:image:height" content="295" />
        <meta property="og:site_name" content="bitsarcade.com" />

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

    </head>
    <body>
        <div class="pageLoader" style="background: #212121;">
            <div class="loader" style="background-image: url(/img/logo/logo_temp.png); background-position: center; opacity: 0.8; background-size: 60%; background-repeat: no-repeat;">
               <div></div>
            </div>
            <div class="error" style="display: none"></div>
        </div>
    

        <div class="wrapper">
            <header>
                <div class="fixed">
                    <div class="logo" onclick="redirect('/')"></div>


                    <div class="menu">
<button
  data-mdb-toggle="sidenav"
  data-mdb-target="#sidenav-1"
  class="btn btn-pink"
  aria-controls="#sidenav-1"
  aria-haspopup="true"
  style="    color: #0fd560;
    background: linear-gradient(#363636, #2c2c2c) !important;
    border-radius: 16px;
    font-size: 1rem;
    box-shadow: 0 3px 6px rgb(0 0 0 / 25%);"
>
  <i class="fas fa-bars"></i>
</button>

                    </div>

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
                                <div class="option select-option mt-1">
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
                            <div class="btn btn-danger btn-rounded wallet-open" style="text-shadow: 0.9px 0.9px #363d42; border-top-left-radius: 0px; border-bottom-left-radius: 0px;"></div>
                        </div>
                    @endif
                    <div class="right">
                        @if(auth()->guest())
                            <button class="btn btn-primary" onclick="$.register()">{{ __('general.auth.register') }}</button>
                            <button class="btn btn-secondary" onclick="$.auth()">{{ __('general.auth.login') }}</button>
                        @else
                            <img onclick="redirect('/user/{{ auth()->user()->_id }}')" src="{{ auth()->user()->avatar }}" alt>
                            <div class="action" data-notification-view onclick="$.displayNotifications()">
                                <i class="fas fa-bell"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </header>
            <div class="globalNotification connectionLostContainer" style="display: none">
                <div class="icon"><i class="fal fa-times"></i></div>
                <div class="text"><span></span></div>
            </div>


            <div class="pageContent" style="opacity: 0">
                {!! $page !!}
            </div>
 

            <div class="container-fluid">
 <div class="collapse-sidebar">
<nav id="sidenav-1" class="sidenav" data-mdb-hidden="true" data-mdb-mode="over" data-mdb-content="#content">
  <ul class="sidenav-menu"> <li class="sidenav-item mt-2 mb-0"> <a class="sidenav-link">
        <i class="fad fa-home me-2"></i><span>Home</span></a>
    </li>

    <li class="sidenav-item mt-2 mb-0"> <a class="sidenav-link"
        ><i style="color: #5cb9ff" class="fad fa-user-circle me-2"></i><span style="font-family: 'Proxima Nova Semi Bd'"> Account</span></a>
      <ul class="sidenav-collapse show">
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
          <a onclick="$.vip()" class="sidenav-link">Your VIP Progress</a>
        </li>
        <li class="sidenav-item">
          <a href='/user/{{ auth()->user()->_id }}' class="sidenav-link">Settings</a>
        </li>
        @endif
      </ul>
    </li>
    <li class="sidenav-item mt-2 mb-0"> <a class="sidenav-link"
        ><i style="color: #5cb9ff" class="fad fa-gift me-3"></i><span style="font-family: 'Proxima Nova Semi Bd'">Promotions</span></a>
      <ul class="sidenav-collapse">
       <li class="sidenav-item">
          <a onclick="redirect('/bonus')" class="sidenav-link">New Player Bonus</a>
        </li>
        <li class="sidenav-item">
         <a onclick="redirect('/bonus')" class="sidenav-link">Faucet</a>
        </li>
        <li class="sidenav-item">
          <a onclick="redirect('/bonus')" class="sidenav-link">Promocode</a>
        </li>
        <li class="sidenav-item">
          <a href='/earn' class="sidenav-link">Earn Wall</a>
        </li>
        <li class="sidenav-item">
          <a onclick="redirect('/partner')" class="sidenav-link">Affiliate Program</a>
        </li>
        <li class="sidenav-item">
          <a onclick="redirect('/bonus')" class="sidenav-link">More promotions..</a>
        </li>

      </ul>
    </li>
    <li class="sidenav-item mt-2 mb-0">
      <a class="sidenav-link"
        ><i  style="color: #5cb9ff" class="fad fa-compress-arrows-alt me-3"></i><span style="font-family: 'Proxima Nova Semi Bd'">RNG Fair Games</span></a>
      <ul class="sidenav-collapse">
                     @foreach(\App\Games\Kernel\Game::list() as $game)
                        @if($game->isDisabled()) @continue @endif
                        @if($game->metadata()->id() == "slotmachine") @continue @endif
                      <li class="sidenav-item">
                        <a onclick="redirect('/game/{{ $game->metadata()->id() }}')" class="sidenav-link"><i class="{{ $game->metadata()->icon() }} me-3"></i> {{ $game->metadata()->name() }}</a>
                      </li>
                    @endforeach
      </ul>
    </li>
<li class="sidenav-item mt-2 mb-0"> <a  onclick="redirect('/gamelist')" class="sidenav-link">
        <i style="color: #0fd560;" class="fad fa-abacus me-3"></i><span>Slots</span></a>
    </li>
    <li class="sidenav-item mt-2 mb-0">
      <a class="sidenav-link "
        ><i  style="color: #5cb9ff" class="fad fa-question-circle me-3"></i><span style="font-family: 'Proxima Nova Semi Bd'">Help</span></a>
      <ul class="sidenav-collapse">
                      <li class="sidenav-item">
                        <a onclick="redirect('/help')" class="sidenav-link"><i class="{{ $game->metadata()->icon() }} me-3"></i> F.A.Q.</a>
                      </li>
                        <li class="sidenav-item">
                        <a onclick="redirect('/help')" class="sidenav-link"><i class="{{ $game->metadata()->icon() }} me-3"></i> Support</a>
                      </li>                    
      </ul>
    </li>
  </ul>
</nav>
</div>

                <div class="live">
                    <div class="header">
                        <div class="pulsating-circle"></div>
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
            <footer>
                <div class="container-fluid">
                    <div class="links">
                        <div class="link">
                    <img src="/img/logo/logo_loader.png" width="85px" height="70px" alt="BitsArcade Logo">
                    <a href="https://www.bitsarcade.com/documents/RNG_Certificate_BITSARCADE_UK27February2021.pdf" target="_blank"><img width="40px" height="50px" src="/images/itechlabs.png" alt="RNG Certificate" style="margin-right: 6px;"></a>
                    <a href="https://secure.ecogra.biz/validator/operator/validate=bitsarcade.com&amp;seal_id=1626f5bc489211b07f8c75b57e41e9f1e78a5a8426e197e0c6437da9ebfaea4c624094439fad0cfdd61f49fc5924bca9&amp;stamp=d4f3109f8d3bce51ca70ded5e25fd3f7/" target="_blank"><img width="60px" height="60px" src="/img/misc/basic-large-validseal.png" alt="eCOGRA License Validation"></a>
                        </div>
                        <div class="link">
                            Bitsarcade.com is operated by Overplayed N.V.
                            <br>Abraham Veerstraat 9, Curaçao, register number 149850, casino licence number 8048/JAZ2019-020
                        </div>
                    </div>
                    <div class="links">
                        <div class="link">
                            <a href="/terms/terms_and_conditions">{{ __('general.footer.terms_and_conditions') }}</a>
                        </div>
                         <div class="link">
                            <a href="/fairness">{{ __('general.footer.fairness') }}</a>
                        </div>
                        <div class="link">
                            <i class="fab fa-discord"></i>
                            <a href="{{ \App\Settings::where('name', 'discord_invite_link')->first()->value }}" target="_blank">@discord</a>
                        </div>
                        <div class="link">
                            <i class="fab fa-telegram"></i>
                            <a href="https://t.me/bitsarcade">Telegram</a>
                        </div>
                    </div>
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
                            <button class="btn btn-block btn-auth-main" onclick="$.auth()">{{ __('general.auth.login') }}</button>
                        </div>
                    @elseif(auth()->user()->mute != null && !auth()->user()->mute->isPast())
                        <div class="message-auth-overlay" style="opacity: 1 !important; text-align: center; font-size: 0.8em;">
                            {{ __('general.error.muted', [ 'time' => auth()->user()->mute ]) }}
                        </div>
                    @endif
                    <div class="d-flex w-100">
                        <div class="column">
                            @if(!auth()->guest())
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
                                                    <i class="fas fa-smile"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <i class="fal fa-smile-wink" id="emoji-container-toggle" onclick="$.unicodeEmojiInit(); $('.emoji-container').toggleClass('active')"></i>
                            </div>
                            <div class="column-icon" onclick="$.sendChatMessage('.text-message')" id="sendChatMessage"><i class="fal fa-share"></i></div>
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
            <div class="control theme-switcher">
                <i class="fas fa-moon-stars" data-dark></i>
                <i class="fas fa-sun" data-light></i>
                <div>{{ __('general.head.theme') }}</div>
            </div>
            <div class="control" data-page-trigger="'/help'" data-toggle-class="active" onclick="redirect('/help')">
                <i class="fas fa-question-circle"></i>
                <div>{{ __('general.head.help') }}</div>
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
@if(!auth()->guest())
<script>
  window.intercomSettings = {
    app_id: "dhg3rheb",
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
// We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/dhg3rheb'
(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/dhg3rheb';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
@endif


    </body>
</html>
