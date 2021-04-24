@if(auth()->guest())
@else
    <div class="container-lg" style="background: transparent !important;">
  <div class="games">
      <div class="row mb-3">
        <div class="col-md-3 col-sm-12 mt-1 mb-2 d-none d-sm-block">
          <div class="card text-center" style="min-height: 165px; background: transparent !important;">
            <div class="card-body" style="background: url(/img/misc/arrows.svg) !important; box-shadow: -3px -3px 8px 1px #11141fcf, 2px 2px 8px 0px #0d0d0dcf, inset 1px 1px 0px 0px #1f2330 !important;">
              <img src="/img/misc/vip-icon.png" height="25px">
              <hr>
             <p><small>BitsArcade's reward program.</small></p>
              <a onclick="$.vip()" class="btn btn-primary p-2 m-1">Rewards</a>
              <a onclick="$.vipBonus()" class="btn btn-primary p-2 m-1">Daily Bonus</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 mt-1 mb-2">

        <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <div class="carousel-inner" style="box-shadow: -3px -3px 8px 1px #11141fcf, 2px 2px 8px 0px #0d0d0dcf, inset 1px 1px 0px 0px #1f2330 !important;">
    <div class="carousel-item" data-mdb-interval="7000">
        <div class="card text-center" style="background: url(img/misc/bg-bits-min.jpg); min-height: 165px;">
          <div class="card-body">
            <p class="card-text" style="text-shadow: 2px 2px black !important;"><h6>
              {{ \App\Settings::where('name', 'featured_newsbox_text')->first()->value }}</h6>
            </p>
            <p class="card-text" style="text-shadow: 1px 1px black !important;"><h5>
              {{ \App\Settings::where('name', 'featured_newsbox_text_2')->first()->value }}</h5>
            </p>
          </div>
        </div>
    </div>
    <div class="carousel-item active" data-mdb-interval="7000">
        <div class="card" style="background: url(img/misc/races.svg); background-size: cover; background-position: center; min-height: 165px;">
          <div class="card-body">

        @php
              $first = (\App\Settings::where('name', 'races_prize_1st')->first()->value);
              $second = (\App\Settings::where('name', 'races_prize_2nd')->first()->value);
              $third = (\App\Settings::where('name', 'races_prize_3rd')->first()->value);
              $fs = (\App\Settings::where('name', 'races_prize_freespins')->first()->value * 7);
              $prizes = $first + $second + $third;
        @endphp
                    <div class="card-text" style="padding: 5px; position: absolute;bottom: 0;text-shadow: 1px 1px black !important;">

                <b>Today's Race</b>
                <br>
                <small><i class="fas fa-usd-circle me-1" style="color: #0fd560;"></i> Total Prizepool:  {{ $prizes }}$ and {{ $fs }} Free Spins</small>               
                <br>
                <small><i style="color: #0fd560;" class="fas fa-stopwatch me-1"></i> Ending in <?php $timeLeft = 86400 - (time() - strtotime("today")); echo date("H\\h  i\\m", $timeLeft); ?></small></p>
                    </p></div>
                    <button style="position: absolute;bottom: 15px;right: 15px;text-shadow: 0px 1px black !important;" onclick="$.races()" class="btn btn-primary">Check Race</button>
          </div>
        </div>
    </div>
    <div class="carousel-item" data-mdb-interval="7000">
        <div class="card" style="background: url(img/misc/bonus-box.svg); background-size: cover; background-position: center; min-height: 165px;">
          <div class="card-body">
            <p class="card-text" style="text-shadow: 1px 1px black !important;">
<div style="left: 0px; text-shadow: 1px 1px black !important;" class="carousel-caption d-none d-md-block">
                    <button style="position: absolute;bottom: 30%;left: 5%;text-shadow: 0px 1px black !important;" onclick="redirect('/bonus')" class="btn btn-danger">Bonus & Freebies</button>
      </div>
            </p>
          </div>
        </div>
    </div>
    <div class="carousel-item" data-mdb-interval="7000">
        <div class="card" style="background: url(/img/misc/earncrypto.svg); background-size: cover; background-position: center; min-height: 165px;">
          <div class="card-body">

                    <div class="card-text" style="padding: 5px; position: absolute;bottom: 0;text-shadow: 1px 1px black !important;">

                <br>
                <small><i class="fad fa-money-bill-alt me-1" style="color: #0fd560;"></i> Earn DOGE instantly completing surveys & offers</small>               
                    </p></div>
                    <button style="position: absolute;bottom: 15px;right: 15px;text-shadow: 0px 1px black !important;" onclick="redirect('/earn')" class="btn btn-primary">Earn Wall</button>
          </div>
        </div>
    </div>
      <div class="carousel-item" data-mdb-interval="7000">
        <div class="card" style="background: url(/img/misc/promocodes.svg); background-size: cover; background-position: center; min-height: 165px;">
          <div class="card-body">

                    <div class="card-text" style="padding: 5px; position: absolute;bottom: 0;right:5%;text-shadow: 1px 1px black !important;">

                <br>
                <small>We automatically share promocodes on our socials!</small>               
                    </p></div>
                    <button style="position: absolute;bottom: 35%;right: 14%;text-shadow: 0px 1px black !important;" onclick="redirect('/bonus')" class="btn btn-primary">Enter Promocode</button>
          </div>
        </div>
    </div>
  </div>

</div>


      </div>                          
      <div class="col-md-3 col-sm-12 mt-1 mb-2 d-none d-sm-block">
        <div class="card text-center" style="min-height: 165px; background: transparent !important;">
          <div class="card-body" style="background: url(/img/misc/arrows.svg) !important; box-shadow: -3px -3px 8px 1px #11141fcf, 2px 2px 8px 0px #0d0d0dcf, inset 1px 1px 0px 0px #1f2330 !important;">
            <img height="20px" width="auto" src="/img/logo/logo_bits_small_content.png"><hr>
            <p><small>Join our socials for freebies.</small></p>
            <a href="{{ \App\Settings::where('name', 'discord_invite_link')->first()->value }}" target="_blank" class="btn btn-primary p-2 m-1"><i class="fab fa-discord"></i> Discord</a>
            <a href="{{ \App\Settings::where('name', 'twitter_link')->first()->value }}" target="_blank"  class="btn btn-primary p-2 m-1"><i class="fab fa-telegram"></i> Telegram</a>
          </div>
        </div>
      </div>
    </div>
</div>
@foreach(\App\GlobalNotification::get() as $notification)
<div class="col-md-12">
  <div class="d-flex">
    @if(!auth()->guest() && auth()->user()->isDismissed($notification)) @continue @endif
    <div class="alert alert-info globalNotification p-2 m-0 mb-3" id="emailNotification" style="border-radius: 4px !important; padding: 1rem !important; padding: 1rem;
    margin-bottom: 1rem; font-weight: 500 !important; color: #22738e !important; background: url(/img/misc/arrows.svg), #d7f2fb !important;">
      <div class="icon"><i class="{{ $notification->icon }}"></i></div>
      <div class="text">{{ $notification->text }}</div>
    </div>
  </div>
</div>
@endforeach
          @if(!auth()->guest())
          @php
          $freespins = \App\Settings::where('name', 'freespin_slot')->first()->value;
          $slotname = \App\Slotslist::get()->where('id', $freespins)->first();
          $notify = auth()->user()->unreadNotifications();
          @endphp
          @if(auth()->user()->freegames > '2')
          <div class="alert alert-info mb-3 mt-3" role="alert">
            <strong>Holy guacamole</strong>. You have <strong>{{ auth()->user()->freegames }}</strong> free spins on your account! Get spinning on <a href="/slots/{{ $slotname->id }}" span style="capitalize; font-weight: 600 !important;">{{ $slotname->n }}</a></b>
          </span>
        </div>
        @endif
        <!-- 
        @if(auth()->user()->unreadNotifications())
         <div class="alert alert-light fade show d-none d-sm-block" role="alert">
            You have <a href="#" onclick="$.displayNotifications()"> {{ $notify->count() }} unread notification(s) </a> on your account.
          </div>
        @endif
        !-->
        @endif
</div>
@endif


<div class="container">
@if(!auth()->guest())
@else
<div class="row">
  <div class="col-12 col-sm-12 col-md-6">
    <div class="bonus-box-small" style="min-height: 335px;">
      <div class="banner-img banner-welcome-slots"></div>
      <div class="text">
        <div class="header"><h5>Our Games</h5></div>
        <p>In addition to <a href="/fairness">Provably Fair</a> games, we offer all of the world's best iGaming providers.</p>
        <p>From Netent to Pragmatic Play, here at {{ \App\Settings::where('name', 'platform_name')->first()->value }} you will never get bored with over 23 game providers.</p>
        <div class="btn btn-secondary m-1 p-2" style="float: right;" onclick="redirect('/gamelist')">Our Games</div>
      </div></div>
    </div>
    <div class="col-12 col-sm-12 col-md-6">
      <div class="bonus-box-small" style="min-height: 335px;">
        <div class="banner-img banner-welcome-socialmedia"></div>
        <div class="text">
          <div class="header"><h5>Tons of Rewards!</h5></div>
          <p>We offer constant bonuses, check out our VIP reward program, daily bonus, welcome offer, partner program and more.</p>
          <p>Get paid in DOGE instantly without a single deposit by completing offers on our earn section.</p>
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

        <div class="bonus-box-small" style="z-index: 1;">
        @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 4px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
        <div id="customNav4" class="owl-nav"></div>
        <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Featured Games</h5>
        <div class="container-flex owl-carousel featured" style="z-index: 1;">
          @foreach(\App\Slotslist::get() as $slots)
          @if($slots->f == '1')
          <div class="card gamepostercard" style="cursor: pointer; margin-left: 15px; margin-right: 15px;">
            @if(!auth()->guest())
            <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster p-2" style="background-image:url(/img/slots/{{ $slots->p }}/{{ $slots->id }}.jpg)">
              @else
              <div onclick="$.auth()" class="game_poster p-2" style="background-image:url(/img/slots/{{ $slots->p }}/{{ $slots->id }}.jpg)">
                @endif
              </div>
              <div class="card-footer">
                <h7 class="card-title">{{ $slots->n }}</h7><br>
                <small><span style="font-style: italic; font-size: 10px; color: #e5e6e7 !important; font-weight: 500; text-transform: capitalize;">{{ $slots->p }}</span></small></div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
          <div class="bonus-box-small" style="z-index: 1;">
          <div id="customNav5" class="owl-nav"></div>
          <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Provably Fair</h5>
          <button style="padding-top: 5px; font-size: 10px; padding-left: 10px;" onclick="redirect('/fairness')" class="btn btn-success m-2 p-1">Fairness</a></button>
          <div class="container-flex owl-carousel provably"  style="z-index: 1;">
            @foreach(\App\Games\Kernel\Game::list() as $game)
            @if(!$game->isDisabled() &&  $game->metadata()->id() !== "slotmachine")
            <div class="card gamepostercard" onclick="redirect('/game/{{ $game->metadata()->id() }}')" style="cursor: pointer; margin-left: 15px; margin-right: 15px;">
              <div style="background-size: cover;" class="game_poster p-2 card-img-top game-{{ $game->metadata()->id() }}" @if(!$game->isDisabled()) onclick="redirect('/game/{{ $game->metadata()->id() }}')" @endif>
                <?php
                $getname = $game->metadata()->name();
                ?>
                @if($getname == "Dice")
                <div class="label-red">
                  HOT!
                </div>
                @endif
                <div class="label-fair">
                  FAIR
                </div>
              </div>
              
              <div class="card-footer">
                <h6 class="card-title">{{ $game->metadata()->name() }}</h5>
                <small><span style="font-style: italic; font-size: 10px; color: #e5e6e7 !important; font-weight: 500; text-transform: capitalize;">{{ \App\Settings::where('name', 'platform_name')->first()->value }}</span></small></div>
              </div>
              @else
              @endif
              @endforeach
            </div>
          </div>
          @if(!auth()->guest())
          <div class="bonus-box-small" style="z-index: 1;">
            @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 4px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
            <div id="customNav3" class="owl-nav"></div>
            <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Random Slots</h5>
            <button onclick="redirect('/gamelist/')" style="padding-top: 5px; font-size: 10px; padding-left: 10px;" class="btn btn-secondary m-2 p-1">More <i class="fas fa-arrow-right" style="font-size: 8px;"></i></a></button>
            <div class="container-flex owl-carousel random" style="z-index: 2;">
              @foreach(\App\Slotslist::all()->random(20) as $slots)
              <div class="card gamepostercard" style="cursor: pointer; margin-left: 15px; margin-right: 15px;">
                    @if(!auth()->guest())
                    <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots_webp/{{ $slots->id }}.webp)">
                    @else
                     <div onclick="$.auth()" class="game_poster" style="background-image:url(/img/slots_webp/{{ $slots->id }}.webp)">
                      @endif
                  </div>
              <div class="card-footer">
                <h7 class="card-title">{{ $slots->n }}</h7><br>
                <small><span style="font-style: italic; font-size: 10px; color: #e5e6e7 !important; font-weight: 500; text-transform: capitalize;">{{ $slots->p }}</span></small></div>
              </div>
                @endforeach
              </div>
            </div>
            <div class="bonus-box-small" style="z-index: 1;">
            @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 4px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
            <div id="customNav2" class="owl-nav"></div>
            <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">New Arrivals</h5>
            <button onclick="redirect('/gamelist/')" style="padding-top: 5px; font-size: 10px; padding-left: 10px;" class="btn btn-secondary m-2 p-1">More <i class="fas fa-arrow-right" style="font-size: 8px;"></i></a></button>
            <div class="container-flex owl-carousel popular"  style="z-index: 1;">
              @foreach(\App\Slotslist::get() as $slots)
              @if($slots->f == '2')
              <div class="card gamepostercard" style="cursor: pointer; margin-left: 15px; margin-right: 15px;">
                @if(!auth()->guest())
                <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster p-2" style="background-image:url(/img/slots/{{ $slots->p }}/{{ $slots->id }}.jpg)">
                  @else
                  <div onclick="$.auth()" class="game_poster p-2" style="background-image:url(/img/slots/{{ $slots->p }}/{{ $slots->id }}.jpg)">
                    @endif
                  </div>
              <div class="card-footer">
                <h7 class="card-title">{{ $slots->n }}</h7><br>
                <small><span style="font-style: italic; font-size: 10px; color: #e5e6e7 !important; font-weight: 500; text-transform: capitalize;">{{ $slots->p }}</span></small></div>
              </div>
                @endif
                @endforeach
              </div>
            </div>
          @endif
                    <div class="container-flex provider-carousel owl-carousel" style="z-index: 1;">
            @foreach(\App\Providers::all()->random(17) as $providers)
            <div class="card m-1" style="background: transparent !important; box-shadow: -3px -3px 8px 1px #11141fcf, 2px 2px 8px 0px #0d0d0dcf, inset 1px 1px 0px 0px #1f2330 !important;">
              <div onclick="redirect('/provider/{{ $providers->name }}')" class="providers m-1" style="background-image:url(/img/providers/{{ $providers->name }}_small.webp)">                  </div>
            </div>
            @endforeach
          </div>
                    </div>  
