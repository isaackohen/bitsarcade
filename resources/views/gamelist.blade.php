<div class="container">
    
    <div class="games" style="max-width: 1420px;">
    <div class="our-games">
            <input type="text" id="gamelist-search" placeholder="Search game or provider..">
                <div class="empty-nomargin-box p-1 d-none d-md-block">
                    <button class="btn btn-success m-1 active" value="" onclick="$.moveNumbers(this.value )">all slots</button>
                    <button class="btn btn-primary m-1" value="feature" onclick="$.moveNumbers(this.value )">featured</button>
                    <button class="btn btn-primary m-1" value="bonus" onclick="$.moveNumbers(this.value )">bonus slots</button>
                    <button class="btn btn-primary m-1" value="wilds" onclick="$.moveNumbers(this.value )">wilds</button>
                    <button class="btn btn-primary m-1" value="free" onclick="$.moveNumbers(this.value )">free spins</button>
                    <button class="btn btn-primary m-1" value="respin" onclick="$.moveNumbers(this.value )">respin</button>
                    <button class="btn btn-secondary m-1" value="bitsarcade" onclick="$.moveNumbers(this.value )">bitsarcade</button>
                    <button class="btn btn-secondary m-1" value="netent" onclick="$.moveNumbers(this.value )">netent</button>
                    <button class="btn btn-secondary m-1" value="playtech" onclick="$.moveNumbers(this.value )">playtech</button>
                    <button class="btn btn-secondary m-1" value="novoline" onclick="$.moveNumbers(this.value )">novoline</button>
                    <button class="btn btn-secondary m-1" value="quickspin" onclick="$.moveNumbers(this.value )">quickspin</button>
                    <button class="btn btn-secondary m-1" value="microgaming" onclick="$.moveNumbers(this.value )">microgaming</button>
                    <button class="btn btn-secondary m-1" value="booongo" onclick="$.moveNumbers(this.value )">booongo</button>
                    <button class="btn btn-secondary m-1" value="wazdan" onclick="$.moveNumbers(this.value )">wazdan</button>
                    <button class="btn btn-secondary m-1" value="merkur" onclick="$.moveNumbers(this.value )">merkur</button>
                    <button class="btn btn-secondary m-1" value="playson" onclick="$.moveNumbers(this.value )">playson</button>
                    <button class="btn btn-secondary m-1" value="amatic" onclick="$.moveNumbers(this.value )">amatic</button>
                    <button class="btn btn-secondary m-1" value="kajot" onclick="$.moveNumbers(this.value )">kajot</button>
                    <button class="btn btn-secondary m-1" value="konami" onclick="$.moveNumbers(this.value )">konami</button>
                    <button class="btn btn-secondary m-1" value="igrosoft" onclick="$.moveNumbers(this.value )">igrosoft</button>
                    <button class="btn btn-secondary m-1" value="apollo" onclick="$.moveNumbers(this.value )">apollo</button>
            </div>
        <div class="games">
                <div class="our-games">


@foreach(\App\Games\Kernel\Game::list() as $game)
        @if(!$game->isDisabled() &&  $game->metadata()->id() !== "slotmachine")
            <div class="card gamepostercard m-2" onclick="redirect('/game/{{ $game->metadata()->id() }}')">

            <div style="background-size: cover;" class="slots_small_poster card-img-top game-{{ $game->metadata()->id() }}" @if(!$game->isDisabled()) onclick="redirect('/game/{{ $game->metadata()->id() }}')" @endif>
        <?php
        $getname = $game->metadata()->name();
         ?>
        @if($getname == "Dice") 
                <div class="label-red">
                    HOT!
                </div>
            @elseif($getname == "Triple") 
                <div

                 class="label-red">
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
                    <button class="btn btn-secondary"  onclick="redirect('/game/{{ $game->metadata()->id() }}')">Play</button>                  
                 </div>
                </div>
            </div>
            
            <div class="card-footer p-2" style="max-width: 190px;">
                <h6 class="card-title">{{ $game->metadata()->name() }}</h5>
                <small>by <a href="#" style="text-transform: capitalize;">BitsArcade</a></small></div>
            </div>
            @else
            @endif
        @endforeach


           @foreach(\App\Slotslist::get() as $slots)
                    <div class="card gamepostercard m-2">

            @if(!auth()->guest())
            <div class="slots_small_poster" onclick="redirect('/slots/{{ $slots->id }}')"  >
                    <img class="img-small-slots" data-src="/img/slots_webp/{{ $slots->id }}.webp">
             @else
                <div class="slots_small_poster" onclick="$.register()">
                    <img class="img-small-slots" data-src="/img/slots_webp/{{ $slots->id }}.webp">
            @endif
                    <div class="label">
                    {{ $slots->p }}
                </div>
                    <div class="name">
                        <div class="name-text">
                            <div class="title">{{ $slots->n }}</div>
                            <div class="desc">{{ $slots->desc }}</div>
                @if(!auth()->guest())               
                            <button class="btn btn-secondary" onclick="redirect('/slots/{{ $slots->id }}')">Play</button>                  
                @else
                            <button class="btn btn-primary" onclick="$.register()">
                                Login
                            </button>
                @endif                                    
                        </div>
                    </div>
                </div>
               <div class="card-footer p-2" style="max-width: 190px;">
                <p class="card-title">{{ $slots->n }}</p>
                <small>by <a href="#">{{ $slots->p }}</a></small></div>
            </div>
        @endforeach
                </div>
            </div>
        </div>
    </div>
        </div>
