<?php namespace App\Currency;

use App\Settings;
use Illuminate\Support\Facades\Log;
use Nbobtc\Command\Command;
use App\Currency\Option\WalletOption;

class BitcoinCash extends V17RPCBitcoin {

    function id(): string {
        return "bch";
    }

    function name(): string {
        return "BCH";
    }

    function icon(): string {
        return "fas fa-bch";
    }

    public function alias(): string {
        return 'bitcoin-cash';
    }

    function style(): string {
        return "#8dc351";
    }

    public function coldWalletBalance(): float {
        return json_decode(file_get_contents('https://rest.bitcoin.com/v2/address/details/'.$this->option('transfer_address')))->balance;
    }

    public function hotWalletBalance(): float {
        return json_decode(file_get_contents('https://rest.bitcoin.com/v2/address/details/'.$this->option('withdraw_address')))->balance;
    }
	
		protected function options(): array {
        return [
             new class extends WalletOption {
                function id() {
                    return "rpc";
                }
                function name(): string {
                    return "RPC URL";
                }
            },
				new class extends WalletOption {
                function id() {
                    return "confirmations";
                }

                function name(): string {
                    return "Required confirmations";
                }
            }, 	new class extends WalletOption {
                public function id() {
                    return 'transfer_address';
                }
                public function name(): string {
                    return 'Transfer deposits to this address';
                }
				
				public function readOnly(): bool {
                    return true;
                }
            },  new class extends WalletOption {
                public function id() {
                    return 'withdraw_address';
                }
                public function name(): string {
                    return 'Transfer withdraws from this address';
                }
            }
        ];
    }

}
