<?php namespace App\WebSocket;

use App\Games\Kernel\Game;

class MultipliersWhisper extends WebSocketWhisper {

    public function event(): string {
        return "Multiplier";
    }

    public function process($data): array {
        $game = Game::find($data->api_id);
        if($game == null) return reject(-3, 'Unknown API game id');
        return success($game->multipliers());
    }

}
