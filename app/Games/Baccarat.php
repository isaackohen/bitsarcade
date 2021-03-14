<?php namespace App\Games;

use App\Games\Kernel\Data;
use App\Games\Kernel\Metadata;
use App\Games\Kernel\ProvablyFairResult;
use App\Games\Kernel\Quick\QuickGame;

class Baccarat extends QuickGame {

    function metadata(): Metadata {
        return new class extends Metadata {
            function id(): string {
                return 'baccarat';
            }

            function name(): string {
                return 'Baccarat';
            }

            function icon(): string {
                return 'fas fa-baccarat';
            }

            public function isPlaceholder(): bool {
                return true;
            }
        };
    }

    function start($user, Data $data) {

    }

    public function isLoss(ProvablyFairResult $result, Data $data): bool
    {
        // TODO: Implement isLoss() method.
    }

    function result(ProvablyFairResult $result): array {
        return $this->getCards($result, 6);
    }

}
