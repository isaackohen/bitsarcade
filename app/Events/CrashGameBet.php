<?php namespace App\Events;

use App\Chat;
use App\Game;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CrashGameBet implements ShouldBroadcastNow {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    private User $user;
    private Game $game;

    public function __construct(User $user, Game $game) {
        $this->user = $user;
        $this->game = $game;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn() {
        return new Channel('Everyone');
    }

    public function broadcastWith() {
        return [
            'user' => $this->user->toArray(),
            'game' => $this->game->toArray()
        ];
    }

}
