@php
    $game = \App\Games\Kernel\Game::find($data);
    if($game == null || $game->isDisabled()) {
        header('Location: /');
        die();
    }
@endphp

<div class="container" id="gamecontainer">
    <div class="game-container mt-1">
        <div class="row">
            <div class="col {{-- d-none d-md-block --}}">
                <div class="game-sidebar"></div>
            </div>
            <div class="col">
                <div class="game-content"></div>
            </div>
        </div>
 </div>
 </div>

<div class="container-lg mt-2">

          <div class="divider">
            <div class="line"></div>
                        <div class="btn btn-primary p-1 m-2" style="min-width: 100px" onclick="redirect('/gamelist/')">Games</div>
                        <div class="btn btn-primary p-1 m-2" style="min-width: 100px" onclick="redirect('/bonus/')">Rewards</div>
                        <div class="btn btn-primary p-1 m-2" style="min-width: 100px" onclick="redirect('/earn/')">Earn</div>

            <div class="line"></div>
        </div>
  <div class="container-sm mt-0 p-4 pt-1">
        <div id="carouselgames" class="carousel slide carousel-fade" data-mdb-ride="carousel">
            <div class="carousel-item active" data-mdb-interval="4000">
              <div class="card" style="background: url(/img/misc/races.svg); background-size: cover; background-position: center; min-height: 165px;">
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
          <div class="carousel-item" data-mdb-interval="4000">
            <div class="card" style="background: url(/img/misc/bonus-box.svg); background-size: cover; background-position: center; min-height: 165px;">
              <div class="card-body">
                <p class="card-text" style="text-shadow: 1px 1px black !important;">
                  <div style="left: 0px; text-shadow: 1px 1px black !important;" class="carousel-caption d-none d-md-block">
                    <button style="position: absolute;bottom: 30%;left: 5%;text-shadow: 0px 1px black !important;" onclick="redirect('/bonus')" class="btn btn-danger">Bonus & Freebies</button>
                  </div>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item active" data-mdb-interval="4000">
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
          <div class="carousel-item" data-mdb-interval="4000">
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




@if(!auth()->guest())
    @php $latest_game = \App\Game::latest()->where('game', $data)->where('user', auth()->user()->_id)->where('status', 'in-progress')->first(); @endphp
    @if(!is_null($latest_game))
        <script type="text/javascript">
            window.restoreGame = {
                'game': {!! json_encode($latest_game->makeHidden('server_seed')->makeHidden('nonce')->makeHidden('data')->toArray()) !!},
                'history': {!! json_encode($latest_game->data['history']) !!},
                'user_data': {!! json_encode($latest_game->data['user_data']) !!}
            };
        </script>
    @else
        <script type="text/javascript">
            window.restoreGame = undefined;
        </script>
    @endif
@endif

  <script>

  const containerElement = document.getElementById("gamecontainer");
  function toggleThing() {
  const newClass = containerElement.className == "container" ? "container-fluid" : "container";
  containerElement.className = newClass;
  }
    </script>