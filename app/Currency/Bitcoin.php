<?php namespace App\Currency;

use Illuminate\Support\Facades\Log;
use Nbobtc\Command\Command;
use Nbobtc\Http\Client;

class Bitcoin extends V17RPCBitcoin {

    function id(): string {
        return "btc";
    }

    function name(): string {
        return "BTC";
    }

    public function alias(): string {
        return "bitcoin";
    }

    function icon(): string {
        return "fab fa-btc-icon";
    }

    function style(): string {
        return "#f7931a";
    }

    public function coldWalletBalance(): float {
        return '0';
    }

    public function hotWalletBalance(): float {
        return '0';
    }

}
