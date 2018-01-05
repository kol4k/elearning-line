<?php

namespace App\Line;

use Illuminate\Support\Facades\Cache;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder;
use Storage;

class BotRepository
{
    /**
     * @var LINEbot
     */
    protected $bot;
    /**
     * @var HTTPClient
     */
    protected $client;

    public function __construct()
    {
        $this->client = new CurlHTTPClient(env('LINE_BOT_ACCESS_TOKEN'));
        $this->bot = new LINEBot($this->client, ['channelSecret' => env('LINE_BOT_SECRET')]);
    }
    
    public function getBot(){
        return $this->bot;
    }
    
    public function userID($ev = []){
        $userType = !empty($ev['source']) ? $ev['source']['type'] : false;
        if($userType == 'user'){
            return $ev['source']['userId'];
        }

        return false;
    }

    public function replyMsg($replyToken,$msgResponse)
    {
        $response = $this->bot->replyText($replyToken, $msgResponse);
        return $response->isSucceeded();
    }
}