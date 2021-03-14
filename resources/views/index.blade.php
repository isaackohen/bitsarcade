<div class="container-fluid">
    <div class="slider">
        <div class="glide" id="slider">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide" style="background: url('/img/misc/boxes.svg') repeat ;">
                        <div class="slideContent">
                            <div class="slideContentWrapper">
                                <div class="header">
                                    Affiliate Program
                                </div>
                                <div class="description">
                                    Check our Partner Program and refer your friends! Get paid for each of your referral's wager.
                                </div>
                                <div class="button-yellow" onclick="redirect('/partner/')">
                                    Get started!
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide" style="background: url('/img/misc/wavenight.svg') repeat;">
                        <div class="image" style="background-image: url({{ asset('/img/misc/treasure-1.svg') }}); background-size: contain;"></div>
                        <div class="slideContent">
                            <div class="slideContentWrapper">
                                <div class="header">
                                    New Player Offer
                                </div>
                                <div class="description">
                                    Get up-to 200 Free Spins after your first deposit, no strings attached or bonus restrictions.
                                </div>
                                <div class="button-yellow" onclick="redirect('/bonus/')">
                                    Promotions
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide" style="background: url('/img/misc/patternbg.png') repeat;">
                        <div class="image" style="background-image: url({{ asset('/img/misc/bonus-1.svg') }}); background-size: cover;"></div>
                        <div class="slideContent">
                            <div class="slideContentWrapper">
                                <div class="header">
                                    Daily Drop
                                </div>
                                <div class="description">
                                   Get a 200$ and upwards daily bonus, depending on your VIP level.
                                </div>
                                <div class="button-yellow" onclick="redirect('/bonus/')">
                                    More Info
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                </button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"></button>
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1"></button>
            </div>
        </div>
    </div>
    @include('modals.nav')

      <?php

        $client = new \outcomebet\casino25\api\client\Client(array(
            'url' => 'https://api.c27.games/v1/',
            'sslKeyPath' => env('c27_path'),
        ));
        $games = $client->listGames();
        $games = array_slice($games['Games'], 0, 1500);
        $popular = \App\Settings::where('name', 'slots_popular_1')->first()->value;
        $highlighted = \App\Settings::where('name', 'slots_highlight_1')->first()->value;
        $featuredslots = \App\Settings::where('name', 'slots_featured_1')->first()->value;
        $newslots = \App\Settings::where('name', 'slots_new_1')->first()->value;

            ?>

                        @foreach(\App\GlobalNotification::get() as $notification)
                @if(!auth()->guest() && auth()->user()->isDismissed($notification)) @continue @endif
                <div class="globalNotification" id="emailNotification">
                    <div class="icon"><i class="{{ $notification->icon }}"></i></div>
                    <div class="text">{{ $notification->text }}</div>
                </div>
                            @endforeach

    
    <div class="games" style="max-width: 1370px;">
        @if(!auth()->guest())
                    <div class="our-games" style="border-radius: 12px; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #2b2d2d, #262829) !important;">
                    <button class="btn btn-login m-1 p-2" onclick="redirect('/partner')">Referrals</button> <button class="btn btn-login m-1 p-2" onclick="redirect('/bonus')">Bonus</button>  <button class="btn btn-login m-1 p-2" onclick="redirect('/earn')">Earn</button> <button class="btn btn-signup p-2 m-1" onclick="$.vip()">Your VIP Progress</button> <img src="/img/logo/logo_temp.png" width="49px" height="38px" style="margin-left: 10px; margin-right: 10px;">

                    </div>
                @else
        <div class="no-emptymargin-box">
 <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="text" style="background: url(/img/misc/arrows.svg);">
                            <h5>Become Affiliate</h5>
                            <p>Earn money up-to <b>0.15% of all of your referred player's bets</b> and other benefits!</p>
                            <div class="btn-auth-main" onclick="redirect('/partner/')">Check Partner Program</div>
                            </div></div>
                        </div>
                   <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="text" style="background: url(/img/misc/arrows.svg);">
                            <h5>Earn Wall</h5>
                            <p>Get credited <b>straight DOGE</b> to your account doing surveys and other tasks.</p>
                        <div class="btn-auth-main" onclick="redirect('/earn/')">Check Earn Wall</div>
                        </div></div>
                    </div>

                   <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="text" style="background: url(/img/misc/arrows.svg);">
                            <h5>Daily Bonus</h5>
                            <p>You play, <b>we pay</b>. After reaching Bronze VIP level you are eligible for a daily juicy cashback & bonus.</p>
                        <div class="btn-auth-main" onclick="redirect('/earn/')">Check Bonus Page</div>
                        </div></div>
                    </div>
                                       <div class="col-12">
                    <div class="our-games" style="border-radius: 12px; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #2b2d2d, #262829) !important;">
                        <button class="btn btn-signup" onclick="$.register()">Register</button> <button class="btn btn-login" onclick="$.auth()">Login</button><img src="/img/logo/logo_temp.png" width="40px" height="32px" style="margin-left: 10px; margin-right: 10px;">   
                    </div>
                                        </div>

            </div>

            </div>



                @endif



        <div class="header">
            <h5>
                <i class="fad fa-diamond" style="color: #0fbc55;"></i> BitsArcade Originals  <button style="float: right;"class="btn btn-more" onclick="redirect('/fairness')">Provably Fair</button>  
            </h5>
        </div>
        <div class="our-games">

@foreach(\App\Games\Kernel\Game::list() as $game)
        @if(!$game->isDisabled() &&  $game->metadata()->id() !== "slotmachine")
            
            <div class="game_poster game-{{ $game->metadata()->id() }}" @if(!$game->isDisabled()) onclick="redirect('/game/{{ $game->metadata()->id() }}')" @endif>
        <?php
        $getname = $game->metadata()->name();
         ?>

        @if($getname == "Dice") 
                <div class="label-red">
                    HOT!
                </div>
            @elseif($getname == "Triple") 
                <div class="label-red">
                    NEW GAME!
                </div>
                    @endif
                <div class="label-fair">
                    FAIR
                </div>
                <div class="name">
                    <div class="name-text">
                            <div class="title">
                    {{ $game->metadata()->name() }}
                                    </div>
                            <button class="btn btn-login" onclick="redirect('/game/{{ $game->metadata()->id() }}')">Play</button>                  
                </div>

                </div>
            </div>
            @else
            @endif
        @endforeach
    
        </div>

             <div class="header">
            <h5>
                <i class="fad fa-diamond" style="color: #f2ae29;"></i> Featured Slots <button style="float: right;"class="btn btn-more" onclick="redirect('/gamelist')">All Games</button>     
            </h5>
        </div>
        <div class="our-games">
          
        @foreach($games as $game)
        @if(in_array($game["Id"], explode(',', $featuredslots))) 
            @if(!auth()->guest())
            
            <div class="slots_poster" style="background-image:url(/img/slots/{{$game['SectionId']}}/{{$game['Id']}}.jpg)" loading="lazy"  onclick="redirect('/slots/{{$game['Id']}}')"  >

             @else
                            
                <div class="slots_poster" style="background-image:url(/img/slots/{{$game['SectionId']}}/{{$game['Id']}}.jpg)" loading="lazy"  onclick="$.register()">
            @endif
                 
                    <div class="label">
                    {{ $game['SectionId'] }}
                </div>
                    <div class="name">
                        <div class="name-text">
                            <div class="title">{{ $game['Name'] }}</div>
                @if(!auth()->guest())
                                 
                            <button class="btn btn-login" onclick="redirect('/slots/{{$game['Id']}}')">Play</button>                  
                @else
                                
                            <button class="btn btn-signup" onclick="$.register()">
                                Login
                            </button>
                @endif
                                    
                        </div>
                    </div>
                </div>
                @endif

        @endforeach
            </div>

                    <div class="our-games" style="border-radius: 12px; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #2b2d2d, #262829) !important;">
                                                    <button class="btn btn-signup" onclick="redirect('/bonus')">Check our on-going bonuses</button> <img src="/img/logo/logo_temp.png" width="40px" height="32px" style="margin-left: 10px; margin-right: 10px;">

                    </div>

    <div class="header">
            <h5>
                <i class="fad fa-star-christmas" style="color: #2e9beb;"></i> All Games <button style="float: right;"class="btn btn-more" onclick="redirect('/bonus')">Bonus</button>     
            </h5>
        </div>
    <div class="our-games">


            <input type="text" id="gamelist-search" placeholder="Search game or provider..">
                <div class="empty-nomargin-box p-1 d-none d-md-block">
                    <button class="btn btn-blue m-1 active" value="" onclick="$.moveNumbers(this.value )">all slots</button>
                    <button class="btn btn-more-yellow m-1" value="feature" onclick="$.moveNumbers(this.value )">featured</button>
                    <button class="btn btn-more-yellow m-1" value="bonus" onclick="$.moveNumbers(this.value )">bonus slots</button>
                    <button class="btn btn-more-yellow m-1" value="wilds" onclick="$.moveNumbers(this.value )">wilds</button>
                    <button class="btn btn-more-yellow m-1" value="free" onclick="$.moveNumbers(this.value )">free spins</button>
                    <button class="btn btn-more-yellow m-1" value="respin" onclick="$.moveNumbers(this.value )">respin</button>
                    <button class="btn btn-more m-1" value="netent" onclick="$.moveNumbers(this.value )">netent</button>
                    <button class="btn btn-more m-1" value="quickspin" onclick="$.moveNumbers(this.value )">quickspin</button>
                    <button class="btn btn-more m-1" value="microgaming" onclick="$.moveNumbers(this.value )">microgaming</button>
                    <button class="btn btn-more m-1" value="booongo" onclick="$.moveNumbers(this.value )">booongo</button>
                    <button class="btn btn-more m-1" value="wazdan" onclick="$.moveNumbers(this.value )">wazdan</button>
                    <button class="btn btn-more m-1" value="playson" onclick="$.moveNumbers(this.value )">playson</button>
                    <button class="btn btn-more m-1" value="egt" onclick="$.moveNumbers(this.value )">egt</button>
                    <button class="btn btn-more m-1" value="amatic" onclick="$.moveNumbers(this.value )">amatic</button>
                    <button class="btn btn-more m-1" value="igrosoft" onclick="$.moveNumbers(this.value )">igrosoft</button>
                    <button class="btn btn-more m-1" value="apollo" onclick="$.moveNumbers(this.value )">apollo</button>

            </div>
        <div class="games">
                    <div class="our-games">

            <div class="row">
                <div class="col-12 col-md-12">
        @foreach($games as $game)
            @if(!auth()->guest())
            
            <div class="slots_small_poster" onclick="redirect('/slots/{{$game['Id']}}')"  >
                    <div class="label-name">{{ $game['Name'] }}</div>
                    <img class="img-small-slots" data-src="/img/slots_webp/{{$game['Id']}}.webp">
             @else
                            
                <div class="slots_small_poster" onclick="$.register()">
                    <div class="label-name">{{ $game['Name'] }}</div>
                    <img class="img-small-slots" data-src="/img/slots_webp/{{$game['Id']}}.webp">
            @endif
                 
                    <div class="label">
                    {{ $game['SectionId'] }}
                </div>
                    <div class="name">
                        <div class="name-text">
                            <div class="title">{{ $game['Name'] }}</div>
                            <div class="desc">{{ $game['Description'] }}</div>
                @if(!auth()->guest())               
                            <button class="btn btn-login" onclick="redirect('/slots/{{$game['Id']}}')">Play</button>                  
                @else
                            <button class="btn btn-signup" onclick="$.register()">
                                Login
                            </button>
                @endif                                    
                        </div>
                    </div>
                </div>

        @endforeach
</div>

                </div>
            </div><div class="our-games" style="background: transparent !important; box-shadow: none;">
                            <button class="btn btn-auth p-4" onclick="redirect('/')">check out our provably fair in-house games<br><img src="/img/logo/logo_temp.png" width="40px" height="32px"></button>
                        </div>

        </div>
    </div>




        </div>
    </div>



