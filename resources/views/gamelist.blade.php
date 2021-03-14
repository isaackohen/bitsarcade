<div class="container-fluid">
    
    <div class="games" style="max-width: 1400px;">

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
    <div class="header">
            <h5>
                <i class="fad fa-star-christmas" style="color: #2e9beb;"></i> All Games <button style="float: right;"class="btn btn-more" onclick="redirect('/bonus')">Bonus</button>     
            </h5>
        </div>
    <div class="our-games">


            <input type="text" id="gamelist-search" placeholder="Search game or provider..">


                <div class="empty-nomargin-box p-1">
                    <button class="btn btn-blue m-1 active" value="" onclick="$.moveNumbers(this.value )">all slots</button>
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
                    <button class="btn btn-more-yellow m-1" value="bonus" onclick="$.moveNumbers(this.value )">bonus slots</button>
                    <button class="btn btn-more-yellow m-1" value="wilds" onclick="$.moveNumbers(this.value )">wilds</button>
                    <button class="btn btn-more-yellow m-1" value="free" onclick="$.moveNumbers(this.value )">free spins</button>
                    <button class="btn btn-more-yellow m-1" value="feature" onclick="$.moveNumbers(this.value )">features</button>
                    <button class="btn btn-more-yellow m-1" value="respin" onclick="$.moveNumbers(this.value )">respin</button>
            </div>
        <div class="games">
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
        </div>
    </div>
    </div>
    </div>



