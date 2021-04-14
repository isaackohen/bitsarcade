@if(auth()->guest())
@else
<div class="container">
  <div class="games">
    <div class="our-games mb-1" style="background: transparent !important;">
      <div class="row">
        @foreach(\App\GlobalNotification::get() as $notification)
        <div class="col-md-12">
          <div class="d-flex">
            @if(!auth()->guest() && auth()->user()->isDismissed($notification)) @continue @endif
            <div class="globalNotification p-2 m-0 mb-2" id="emailNotification" style="background: url(/img/misc/arrows.svg), linear-gradient(#3596f5, #297dd0) !important; box-shadow: 0 10px 20px 0 rgb(0 0 0 / 25%);">
              <div class="icon"><i class="{{ $notification->icon }}"></i></div>
              <div class="text">{{ $notification->text }}</div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-md-3 col-sm-12 mt-2 mb-">
          <div class="card text-center" style="min-height: 275px;">
            <div class="card-header" style="background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">Profile</div>
            <div class="card-body" style="background: url(/img/misc/patternbg.png), linear-gradient(59deg, #313841, #2c323a) !important;">
              <h5 class="card-title">{{ auth()->user()->name }}</h5>
              <p class="card-text">
                <img onclick="redirect('/user/{{ auth()->user()->_id }}')" src="{{ auth()->user()->avatar }}" alt>
              </p>
              <button onclick="$.wallet()" class="btn btn-secondary p-1 m-1">Wallet</button>
              <button onclick="$.leaderboard()" class="btn btn-secondary p-1 m-1">Leaderboard</button>
            <button data-toggle-bonus-sidebar="promo" class="btn btn-danger p-1 m-1">Promocode</a>
          </div>
          <div class="card-footer text-muted" style="font-size: 0.79rem; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">Registered since {{ auth()->user()->created_at }}</div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 mt-2 mb-3">
        <div class="card text-center" style="background: url(https://cdn.coingape.com/wp-content/uploads/2019/05/02174558/Dogecoin-DOGE-Price-On-Leap-As-Largest-Exchange-Bid-To-Support-DOGE-on-Official-Wallet-678x381.jpg), linear-gradient(59deg, #2b2d2d, #26282900) !important;background-size: contain !important;min-height: 275px;height: 100% !important;background-position: center;background-repeat: no-repeat; scale: 0.8;">
          <div class="card-header" style="background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">Featured News</div>
          <div class="card-body" style="background: linear-gradient( #22272ef7,  #1f2226ed) !important;">
            <h5 class="card-title">{{ \App\Settings::where('name', 'featured_newsbox_title')->first()->value }}</h5>
            <p class="card-text" style="text-shadow: 2px 2px black !important;"><h6>
              {{ \App\Settings::where('name', 'featured_newsbox_text')->first()->value }}</h6>
            </p>
            <p class="card-text" style="text-shadow: 1px 1px black !important;"><h5>
              {{ \App\Settings::where('name', 'featured_newsbox_text_2')->first()->value }}</h5>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 mt-2 mb-2">
        <div class="card text-center" style="min-height: 275px;">
          <div class="card-header" style="background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">Bonus</div>
          <div class="card-body" style="background: url(/img/misc/patternbg.png), linear-gradient(59deg, #313841, #2c323a) !important;">
            <h5 class="card-title">Freebies!</h5>
            <p class="card-text">
              Check all promotions such as deposit bonus <a href="/bonus">here</a>!
            </p>
            <a href="/bonus" class="btn btn-secondary p-2 m-1">Faucet</a>
            <a onclick="$.vip()" class="btn btn-success p-2 m-1">VIP</a>
            <a onclick="$.vipBonus()" class="btn btn-pink p-2 m-1">Daily Bonus</a>
            <a href="/earn" class="btn btn-info p-2 m-1">Earn Wall</a>
          </div>
          <div class="card-footer text-muted" style="font-size: 0.79rem; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">VIP Level - {{ __('vip.rank.'.(auth()->user()->vipLevel() == 5 ? 4 : auth()->user()->vipLevel())) }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endif
<?php
$client = new \outcomebet\casino25\api\client\Client(array(
'url' => 'https://api.c27.games/v1/',
'sslKeyPath' => env('c27_path'),
));
$games = $client->listGames();
$games = array_slice($games['Games'], 0, 1500);
$featuredslots = \App\Settings::where('name', 'slots_featured_1')->first()->value;
?>
<div class="container">
@if(!auth()->guest())
@else
  <div class="row">
    <div class="col-12 col-sm-12 col-md-6">
      <div class="bonus-box-small" style="min-height: 325px;">
        <div class="banner-img banner-welcome-slots"></div>
        <div class="text">
          <div class="header"><h5>Slots</h5></div>
          <p>In addition to our <a href="/fairness">Provably Fair</a> games, we offer all of the world's greatest providers.</p>
          <p>From Netent, Quickspin to Pragmatic Play, here at {{ \App\Settings::where('name', 'platform_name')->first()->value }} you will never get bored with over 23 game providers.</p>
          <div class="btn btn-secondary m-1 p-2" style="float: right;" onclick="redirect('/gamelist')">Our Games</div>
        </div></div>
      </div>
      <div class="col-12 col-sm-12 col-md-6">
        <div class="bonus-box-small" style="min-height: 325px;">
          <div class="banner-img banner-welcome-socialmedia"></div>
          <div class="text">
            <div class="header"><h5>Social Media</h5></div>
            <p>Join our Social Media channels and get tons of freebies. We automatically publish promocodes on our Discord & Telegram channel.</p>
            <p>Stay up-to-date and also get in direct contact with other community members.</p>
            <div class="btn btn-secondary m-1 p-2" style="float: right;" onclick="$.vipBonus()">Claim Bonus</div>
          </div></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="button-bar-small" onclick="redirect('/partner/')">
            <div class="text" style="background: transparent !important; border-radius: 12px;">
              <h5 style="margin-bottom: 1px; font-weight: 600;">Partner</h5>
              <p>Earn money up-to <b>0.15% of all of your referred player's bets</b> and other benefits!</p>
            </div></div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="button-bar-small" onclick="redirect('/bonus/')">
              <div class="text" style="background: transparent !important; border-radius: 12px;">
                <h5 style="margin-bottom: 1px; font-weight: 600;">Daily Bonus</h5>
                <p>You play, <b>we pay</b>. After reaching Bronze VIP level you are eligible for a daily juicy bonuses.</p>
              </div></div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <div class="button-bar-small" onclick="redirect('/earn/')">
                <div class="text" style="background: transparent !important; border-radius: 12px;">
                  <h5 style="margin-bottom: 1px; font-weight: 600;">Earn</h5>
                  <p>Get credited <b>straight DOGE</b> to your account doing surveys and other tasks.</p>
                </div></div>
              </div>
            </div>
          @endif

          <div class="bonus-box-small p-2">
              <h5 style="padding-top: 5px; padding-bottom: 5px; padding-left: 13px; margin-bottom: 1px; font-weight: 600;">Featured Games</h5>

                <div class="owl-carousel">

                  @foreach($games as $game)

                  @if(in_array($game["Id"], explode(',', $featuredslots)))
                  
                  <div class="card gamepostercard" style="cursor: pointer; margin-left: 1.4vh; margin-right: 1.4vh;">
                    @if(!auth()->guest())
                    <a href="/slots/{{$game['Id']}}"><div class="game_poster" style="background-image:url(/img/slots/{{$game['SectionId']}}/{{$game['Id']}}.jpg)"></a>
                    @else
                    <div class="game_poster" style="background-image:url(/img/slots/{{$game['SectionId']}}/{{$game['Id']}}.jpg)">
                      @endif
                      <div class="label">
                        {{ $game['SectionId'] }}
                      </div>
                      <div class="name">
                        <div class="name-text">
                          <div class="title">{{ $game['Name'] }}</div>
                          @if(!auth()->guest())
                          
                          <a href="/slots/{{$game['Id']}}"><button class="btn btn-secondary">Play</button></a>
                          @else
                          <button class="btn btn-primary" onclick="$.register()">
                          Login
                          </button>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="card-footer p-2">
                    <h7 class="card-title m-1">{{ $game['Name'] }}</h7></div>
                  </div>
                  @endif
                  @endforeach
                </div>
                          <div class="our-games-box" style="justify-content: center !important; background: transparent !important;">
            <button class="btn btn-primary" onclick="redirect('/gamelist')">Check All 1102 Games</button> 
          </div>
              </div>

          </div>

