<?php

namespace App\Http\Controllers;

class EvoController extends Controller
{
	
	private $system_id = '1104';
	private $secret_key = 'd815e784f1d9f6fb55c987b4fe274e05';
	private $version = '1';
	private $currency = 'USD';
	
	public function list()
    {
		$signature = $this->system_id.'*'.$this->version.'*'.$this->secret_key;
		$response = file_get_contents('http://api.production.games/Game/getList?project='.$this->system_id.'&version=1&signature='.md5($signature).'');
		return response($response)->header('Content-Type', 'application/json');
	}
	
	public function game($slug)
    {
		
		$user = auth()->user();
	
		if (strlen($slug) > 25)
		{
			return redirect('/');
		}
	
		$slugsanitize = preg_replace("/[\/\{\}\)\(\%#\$]/", "sanitize", $slug);
	
		if (!$user) 
		{
			return redirect('/');
		}
	
		$token = uniqid();
		$game = 'fullstate\\html5\\evoplay\\'.$slug;
		$args = [ 
					$token, 
					$game, 
					[
						$user->_id, 
						'https://c2c2.datagamble.nl', //exit_url 
						'https://c2c2.datagamble.nl' //cash_url
					], 
					'1', //denomination
					$this->currency, //currency
					'1', //return_url_info
					'2' //callback_version
				]; 
				
		$signature = self::getSignature($this->system_id, $this->version, $args, $this->secret_key);
		
		$response = json_decode(file_get_contents('http://api.production.games/Game/getURL?project='.$this->system_id.'&version=1&signature='.$signature.'&token='.$token.'&game='.$game.'&settings[user_id]='.$user->_id.'&settings[exit_url]=https://c2c2.datagamble.nl&settings[cash_url]=https://c2c2.datagamble.nl&denomination=1&currency=USD&return_url_info=1&callback_version=2'), true);
		$url = $response['data']['link'];
		$view = view('evoplay')->with('url', $url);
		return view('layouts.app')->with('page', $view);
	}

	public function getSignature($system_id, $version, array $args, $secret_key)
	{
        $md5 = array();
                $md5[] = $system_id;
                $md5[] = $version;
                foreach ($args as $required_arg) {
                        $arg = $required_arg;
                        if(is_array($arg)){
                                if(count($arg)) {
                                        $recursive_arg = '';
                                        array_walk_recursive($arg, function($item) use (& $recursive_arg) { if(!is_array($item)) { $recursive_arg .= ($item . ':');} });
                                        $md5[] = substr($recursive_arg, 0, strlen($recursive_arg)-1); // get rid of last colon-sign
                                } else {
                                $md5[] = '';
                                }
                        } else {
                $md5[] = $arg;
                }
        };
        $md5[] = $secret_key;
        $md5_str = implode('*', $md5);
        $md5 = md5($md5_str);
        return $md5;
	}
	
}
