@if(auth()->guest())
@else
<div class="container-lg" style="background: transparent !important;">
    <div class="row mb-1">
      <div id="loyaltybanner" class="col-md-4 col-12 mt-1 d-none d-sm-block">
                  <div class="container-container" style="z-index: 1;">
        <div class="card text-center" style="min-height: 150px; background: transparent !important;">
        <div class="card-body" style="background: url(/img/misc/carbon.png) !important;">
            <img src="/img/logo/ico.png" style="max-height: 19px;"> Loyalty Club
            <hr>
            @if(auth()->user()->vipLevel() > '0')
            <a onclick="$.vip()" class="btn btn-primary p-1 m-1">Loyalty Rewards</a>
            @else
            <a onclick="$.vip()" class="btn btn-primary p-1 m-1">Loyalty Rewards</a>
            <a onclick="redirect('/bonus/')" class="btn btn-primary p-1 m-1">Bonus</a>
            @endif
            @if(auth()->user()->weekly_bonus_obtained)
            <a onclick="$.vipBonus()" class="btn btn-primary p-1 m-1 disabled">Royalty Claimed</a>
            @elseif(auth()->user()->vipLevel() > '0')
            @php
            $bonuses = number_format(((auth()->user()->weekly_bonus ?? 0) / 100) * auth()->user()->vipBonus(), 8, '.', '');
            $bonususd = number_format(($bonuses * \App\Http\Controllers\Api\WalletController::rateDollarEth()), 2, '.', '');
            @endphp
            <a onclick="$.vipBonus()" class="btn btn-primary p-1 m-1">Daily Royalty - {!! __('general.takeindex', ['value' => floatval($bonususd), 'icon' => "fas fa-usd-circle"]) !!}</a>
            @else
            @endif
          </div>
        </div>
      </div>
      </div>
      <div class="col-md-8 col-sm-12 ">
          <div class="container-flex owl-carousel topcarousel" style="z-index: 1;">
              <div class="carousel-container" style="background: url(img/misc/races.svg); background-size: cover; background-position: center; min-height: 148px;">
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
                <button style="position: absolute;bottom: 15px;right: 15px;text-shadow: 0px 1px black !important;" onclick="$.races()" class="btn btn-danger p-2">Check Race</button>
              </div>
            </div>
            <div class="carousel-container" style="background: url(img/misc/bonus-box.svg); background-size: cover; background-position: center; min-height: 148px;">
              <div class="card-body">
                <p class="card-text" style="text-shadow: 1px 1px black !important;">
               <p><i style="color: #0fd560;" class="fas fa-gift me-1"></i> Make use of tons of freebies, such as Faucet.</p>

                  <div style="left: 0px; text-shadow: 1px 1px black !important;" class="carousel-caption d-none d-md-block">
                <button style="position: absolute;bottom: 45%;left: 5%;text-shadow: 0px 1px black !important;" onclick="redirect('/earn')" class="btn btn-danger p-2">Bonus Section</button>
                  </div>
                </p>
              </div>
            </div>
            <div class="carousel-container" style="background: url(/img/misc/earncrypto.svg); background-size: cover; background-position: center; min-height: 148px;">
              <div class="card-body">
                <div class="card-text" style="padding: 5px; position: absolute;bottom: 0;text-shadow: 1px 1px black !important;">
                  <br>
                  <small><i class="fad fa-money-bill-alt me-1" style="color: #0fd560;"></i> Earn ETHEREUM <i class="{{ \App\Currency\Currency::find('eth')->icon() }}" style="color: {{ \App\Currency\Currency::find('eth')->style() }}"></i> instantly completing surveys & offers</small>
                </p></div>
                <button style="position: absolute;bottom: 15px;right: 15px;text-shadow: 0px 1px black !important;" onclick="redirect('/earn')" class="btn btn-danger p-2">Earn Wall</button>
              </div>
            </div>
            <div class="carousel-container" style="background: url(/img/misc/promocodes.svg); background-size: cover; background-position: center; min-height: 148px;">
              <div class="card-body">
                <div class="card-text" style="padding: 5px; position: absolute;bottom: 0;right:5%;text-shadow: 1px 1px black !important;">
                  <br>
                  <small>We automatically share promocodes on our socials!</small>
                </p></div>
                <button style="position: absolute;bottom: 35%;right: 14%;text-shadow: 0px 1px black !important;" onclick="redirect('/bonus')" class="btn btn-primary p-2">Enter Promocode</button>
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

@php
$freespins = \App\Settings::where('name', 'freespin_slot')->first()->value;
$slotname = \App\Slotslist::get()->where('id', $freespins)->first();
$freespinevo = \App\Settings::where('name', 'evoplay_freespin_slot')->first()->value;
$evoslotname = \App\Slotslist::get()->where('u_id', $freespinevo)->first()->n;
$evoslotabsolute = \App\Slotslist::get()->where('u_id', $freespinevo)->first()->id;

$notify = auth()->user()->unreadNotifications();
@endphp
@if(auth()->user()->freegames > '1')
<div class="alert alert-info mb-3 mt-3" role="alert">
  You have <strong>{{ auth()->user()->freegames }} free <i class="{{ \App\Currency\Currency::find('eth')->icon() }}" style="color: {{ \App\Currency\Currency::find('eth')->style() }}"></i> spins</strong> on your account! Get spinning on {{ $slotname->p }}'s <a href="/slots/{{ $slotname->id }}" span style="capitalize; font-weight: 600 !important;">{{ $slotname->n }}</a> or on EvoPlay's <a href="/slots-evo/{{ $evoslotabsolute }}" span style="capitalize; font-weight: 600 !important;">{{ $evoslotname }}</a>.</b>
</span>
</div>
@endif
</div>
@endif
<div class="container-lg">

@if(auth()->guest())
<div class="row">
<div class="col-12 col-sm-12 col-md-6">
  <div class="bonus-box-small" style="min-height: 335px;">
    <div class="banner-img banner-welcome-slots" style="background: url(img/misc/races.svg); background-size: cover; background-position: center; min-height: 145px;"></div>
    <div class="text">
      <div class="header"><h5>Daily Races Playing Slots!</h5></div>
      <p>In addition to <a href="/fairness">Provably Fair</a> games, we offer fun daily races and events to compete playing your favorite slots.</p>
      <p>From Netent to Pragmatic Play, here at {{ \App\Settings::where('name', 'platform_name')->first()->value }} you will never get bored with over 23 game providers.</p>
      <div class="btn btn-primary m-1 p-2" style="float: right;" onclick="$.races()">Races</div>
      <div class="btn btn-secondary m-1 p-2" style="float: right;" onclick="redirect('/gamelist')">Our Games</div>
    </div></div>
  </div>
  <div class="col-12 col-sm-12 col-md-6">
    <div class="bonus-box-small" style="min-height: 335px;">
    <div class="banner-img banner-welcome-slots" style="background: url(img/misc/earncrypto.svg); background-size: cover; background-position: center; min-height: 145px;"></div>
      <div class="text">
        <div class="header"><h5>Tons of Rewards!</h5></div>
        <p>We offer constant bonuses, check out our Loyalty Reward Program, Daily Rakeback, partner program and more.</p>
        <p>Get paid in ETHEREUM <i class="{{ \App\Currency\Currency::find('eth')->icon() }}" style="color: {{ \App\Currency\Currency::find('eth')->style() }}"></i> instantly without a single deposit by completing offers on our earn section.</p>
        <div class="btn btn-primary m-1 p-2" style="float: right;" onclick="redirect('/earn/')">Earn Wall</div>
        <div class="btn btn-secondary m-1 p-2" style="float: right;" onclick="redirect('/bonus/')">Promotions</div>

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
            <p>You play, <b>we pay</b>. After reaching Emerald Loyalty Level, you are eligible for a daily bonuses.</p>
          </div></div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="button-bar-small" onclick="redirect('/earn/')">
            <div class="text" style="background: transparent !important; border-radius: 12px;">
              <h5 style="margin-bottom: 1px; font-weight: 600;">Earn</h5>
              <p>Get credited <b>straight ETHEREUM <i class="{{ \App\Currency\Currency::find('eth')->icon() }}" style="color: {{ \App\Currency\Currency::find('eth')->style() }}"></i></b> to your account doing surveys and other tasks.</p>
            </div></div>
          </div>
        </div>
          @endif

        <div class="games-box" style="z-index: 1;">
          @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 15px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
          <div id="customNav4" class="owl-nav"></div>
          <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Featured Games</h5>
          <div class="container-flex owl-carousel featured" style="z-index: 1;">
            @foreach(\App\Slotslist::get()->shuffle() as $slots)
            @if($slots->f == '1')
            <div class="card gamepostercard" style="cursor: pointer; margin-left: 7px; margin-right: 7px;">
              @if(!auth()->guest())
              @if($slots->p == 'evoplay') 
              <div onclick="redirect('/slots-evo/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @else
              <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @endif
                @else
                <div onclick="$.auth()" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
                  @endif
   
                </div>
                    <div class="card-footer">
                      <span class="game-card-name">{{ $slots->n }}</span><br>
                      <small><span class="game-card-provider">{{ $slots->p }}</span></small></div>
                    </div>
                @endif
                @endforeach
              </div>
            </div>

        <div class="games-box" style="z-index: 1;">
          @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 15px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
          <div id="customNav1123" class="owl-nav"></div>
          <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Bonus Buy Games</h5>
          <div class="container-flex owl-carousel mascot" style="z-index: 1;">
            @foreach(\App\Slotslist::get()->shuffle() as $slots)
            @if($slots->f == '7')
            <div class="card gamepostercard" style="cursor: pointer; margin-left: 7px; margin-right: 7px;">
              @if(!auth()->guest())
              @if($slots->p == 'evoplay') 
              <div onclick="redirect('/slots-evo/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @else
              <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @endif
                @else
                <div onclick="$.auth()" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
                  @endif
   
                </div>
                    <div class="card-footer">
                      <span class="game-card-name">{{ $slots->n }}</span><br>
                      <small><span class="game-card-provider">{{ $slots->p }}</span></small></div>
                    </div>
                @endif
                @endforeach
              </div>
            </div>

@if(!auth()->guest() || auth()->guest())

        <div class="games-box" style="z-index: 1;">
                          @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 15px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif

          <div id="customNav55" class="owl-nav"></div>
          <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Evoplay Games </h5>
            <button style="padding-top: 5px; font-size: 10px; padding-left: 10px;" onclick="redirect('/provider/evoplay')" class="btn btn-light m-2 p-1">NEW PROVIDER</a> </button>
            <button onclick="redirect('/provider/evoplay/')" style="padding-top: 5px; font-size: 10px; padding-left: 10px;" class="btn btn-primary m-2 p-1">More Evoplay<i class="fas fa-arrow-right" style="font-size: 8px;"></i></a></button>

          <div class="container-flex owl-carousel evoplay" style="z-index: 1;">
            @foreach(\App\Slotslist::get()->shuffle() as $slots)
            @if($slots->f == '5')
            <div class="card gamepostercard" style="cursor: pointer; margin-left: 7px; margin-right: 7px;">
              @if(!auth()->guest())
              @if($slots->p == 'evoplay') 
              <div onclick="redirect('/slots-evo/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @else
              <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @endif
                @else
                <div onclick="$.auth()" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
                  @endif

                </div>
                    <div class="card-footer">
                      <span class="game-card-name">{{ $slots->n }}</span><br>
                      <small><span class="game-card-provider">{{ $slots->p }}</span></small></div>
                    </div>
                @endif
                @endforeach
              </div>
            </div>
            <div class="games-box" style="z-index: 1;">
              @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 15px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
              <div id="customNav5" class="owl-nav"></div>
              <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Provably Fair</h5>
            <button style="padding-top: 5px; font-size: 10px; padding-left: 10px;" onclick="redirect('/fairness')" class="btn btn-success m-2 p-1">Fairness</a></button>
            <div class="container-flex owl-carousel provably"  style="z-index: 1;">
              @foreach(\App\Games\Kernel\Game::list() as $game)
              @if(!$game->isDisabled() &&  $game->metadata()->id() !== "slotmachine" && $game->metadata()->id() !== "evoplay")
              <div class="card gamepostercard" onclick="redirect('/game/{{ $game->metadata()->id() }}')" style="cursor: pointer; margin-left: 7px; margin-right: 7px;">
                <div class="game_poster" style="background-image:url(/img/game/{{ $game->metadata()->id() }}.png)" @if(!$game->isDisabled()) onclick="redirect('/game/{{ $game->metadata()->id() }}')" @endif>
                  <?php
                  $getname = $game->metadata()->name();
                  ?>

                @if($getname == "Slide")
                  <div class="label-red">
                    NEW!
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
              <div class="games-box" style="z-index: 1;">
                @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 15px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
                <div id="customNav25" class="owl-nav"></div>
                <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Casino Games</h5>
              <button onclick="redirect('/gamelist/')" style="padding-top: 5px; font-size: 10px; padding-left: 10px;" class="btn btn-secondary m-2 p-1">More <i class="fas fa-arrow-right" style="font-size: 8px;"></i></a></button>
              <div class="container-flex owl-carousel casinogames"  style="z-index: 1;">
                @foreach(\App\Slotslist::get()->shuffle() as $slots)
                @if($slots->f == '3')
                <div class="card gamepostercard" style="margin-left: 7px; margin-right: 7px;">
                  @if(!auth()->guest())
              @if($slots->p == 'evoplay') 
              <div onclick="redirect('/slots-evo/{{ $slots->id }}')" class="game_poster" style="cursor: pointer; background-image:url(/img/slots/webp/{{ $slots->id }}.webp)">
              @else
              <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster" style="cursor: pointer; background-image:url(/img/slots/webp/{{ $slots->id }}.webp)">
              @endif
                      @endif
                    </div>
                    <div class="card-footer">
                      <span class="game-card-name">{{ $slots->n }}</span><br>
                      <small><span class="game-card-provider">{{ $slots->p }}</span></small></div>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </div>


              <div class="games-box" style="z-index: 1;">
                @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 15px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
                <div id="customNav2" class="owl-nav"></div>
                <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">New Arrivals</h5>
              <button onclick="redirect('/gamelist/')" style="padding-top: 5px; font-size: 10px; padding-left: 10px;" class="btn btn-secondary m-2 p-1">More <i class="fas fa-arrow-right" style="font-size: 8px;"></i></a></button>
              <div class="container-flex owl-carousel popular"  style="z-index: 1;">
                @foreach(\App\Slotslist::get()->shuffle() as $slots)
                @if($slots->f == '2')
                <div class="card gamepostercard" style="cursor: pointer; margin-left: 7px; margin-right: 7px;">
                  @if(!auth()->guest())
              @if($slots->p == 'evoplay') 
              <div onclick="redirect('/slots-evo/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @else
              <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @endif
                      @endif
                    </div>
                    <div class="card-footer">
                      <span class="game-card-name">{{ $slots->n }}</span><br>
                      <small><span class="game-card-provider">{{ $slots->p }}</span></small></div>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </div>
            <div class="games-box" style="z-index: 1;">
              @if(!auth()->guest())<div style="cursor: pointer; padding-top: 11px; padding-left: 15px; font-weight: 600;" class="action" onclick="$.displaySearchBar()"><i class="fas fa-search"></i></div>@endif
              <div id="customNav3" class="owl-nav"></div>
              <h5 style="padding-top: 9px; padding-left: 7px; font-weight: 600;">Random Slots</h5>
            <button onclick="redirect('/gamelist/')" style="padding-top: 5px; font-size: 10px; padding-left: 10px;" class="btn btn-secondary m-2 p-1">More <i class="fas fa-arrow-right" style="font-size: 8px;"></i></a></button>
            <div class="container-flex owl-carousel random" style="z-index: 2;">
              @foreach(\App\Slotslist::all()->shuffle()->random(20) as $slots)
              @if($slots->p !== "amatic" && $slots->p !== "igrosoft" && $slots->p !== "egt" && $slots->p !== "greentube" && $slots->p !== "konami" && $slots->p !== "apollo")
              <div class="card gamepostercard" style="cursor: pointer; margin-left: 7px; margin-right: 7px; filter: brightness(0.86);">
                @if(!auth()->guest()) 
              @if($slots->p == 'evoplay') 
              <div onclick="redirect('/slots-evo/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @else
              <div onclick="redirect('/slots/{{ $slots->id }}')" class="game_poster" style="background-image:url(/img/slots-wide/{{ $slots->p }}/{{ $slots->id }}.webp)">
              @endif
                    @endif
                  </div>
                  <div class="card-footer">
                      <span class="game-card-name">{{ $slots->n }}</span><br>
                      <small><span class="game-card-provider">{{ $slots->p }}</span></small></div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
                @endif
                                      
                <div class="container-flex provider-carousel owl-carousel" style="z-index: 1;">
                  @foreach(\App\Providers::all()->shuffle()->random(18) as $providers)
                  <div class="card m-1" style="background: transparent !important; box-shadow: -3px -3px 8px 1px #11141fcf, 2px 2px 8px 0px #0d0d0dcf, inset 1px 1px 0px 0px #1f2330 !important;">
                    <div onclick="redirect('/provider/{{ $providers->name }}')" class="providers m-1" style="background-image:url(/img/providers/{{ $providers->name }}_small.webp)">                  </div>
                  </div>
                  @endforeach
                </div>
                  <div class="divider">
            <div class="line"></div>
                        <div class="btn btn-primary p-2 m-2" style="min-width: 150px" onclick="redirect('/gamelist/')">View All Games</div>
            <div class="line"></div>
                @endif
              </div>


        </div>