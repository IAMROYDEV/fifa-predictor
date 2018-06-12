<?php
namespace App\Service;

use GuzzleHttp\Client;

class SlackService
{
    public static $url;
    public static $client;
    public function __construct()
    {
        $this->client=new Client();
        $this->url=env('SLACK_URL');
    }
    public static function init()
    {
        self::$url=env('SLACK_URL');
        self::$client=new Client();
    }
    public static function sendMessage($message)
    {
        self::init();
        if (!self::$url) {
            return ;
        }
        self::$client->post(self::$url, [
            'json'=>[
                'text'=>$message
            ]
        ]);
    }
}
