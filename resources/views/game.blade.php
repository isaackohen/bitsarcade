@php
    $game = \App\Games\Kernel\Game::find($data);
    if($game == null || $game->isDisabled()) {
        header('Location: /');
        die();
    }
@endphp

<div class="container-fluid">
    <div class="game-container mt-2">
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

            <div class="our-games mt-4" style="border-radius: 12px; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">
            <button class="btn btn-secondary" onclick="redirect('/gamelist')">Games</button> <img src="/img/logo/logo_temp.png" width="40px" height="32px" style="margin-left: 10px; margin-right: 10px;">
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
