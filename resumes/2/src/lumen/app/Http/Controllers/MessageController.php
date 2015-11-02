<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller {

	private $redis;

	public function __construct(\Predis\Client $redis)
	{
		$this->redis = $redis;
	}

	public function getMessages(Request $req)
	{
		$msgs = $this->redis->lrange("messages", -10, -1);
		return response()->json(array_reverse($msgs));
	}


	public function postMessages(Request $req)
	{
		$msg = $req->json()->get('message');
		$this->redis->rpush("messages", $msg);
	}

}
