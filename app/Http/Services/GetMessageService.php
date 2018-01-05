<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Cache;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder;
use App\Line\BotRepository;

class GetMessageService
{
    /**
     * @var LINEBot
     */
    private $bot;
    /**
     * @var HTTPClient
     */
    private $client;
    
    protected $bot_repo;

    public function __construct(BotRepository $bot_repo)
    {
        $this->bot_repo = $bot_repo;
    }

    public function replySend($formData)
    {
        $ev = $formData['events']['0'];
        $replyToken = $ev['replyToken'];
        $response = $this->bot_repo->replyMsg($replyToken,'Bot is Active.');
        return $response;
    }
}