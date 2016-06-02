<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Ivory\HttpAdapter\Guzzle6HttpAdapter;
use SparkPost\SparkPost;

class Sender
{
    private $spark;
    private static $API_KEY = 'f74ba4aa3966924b4aab61c609769bcf8cd35671';

    public function __construct()
    {
        $client = new Client();
        $httpAdapter = new Guzzle6HttpAdapter($client);
        $this->spark = new SparkPost($httpAdapter, ['key'=>self::$API_KEY]);
    }

    public function send($user){
        $results = $this->spark->transmission->send([
            'from'=>[
                'name' => 'My Student Life',
                'email' => 'from@sparkpostbox.com>'
            ],
            'html'=>'<html>
                     <body>
                     <h1>Hello, {{name}} do you forgot you Password?</h1>
                     <p>You send to us a request for a new password</p>
                     <p>Please, click here to change your password</p></body></html>',
            'text'=>'Hello {{name}}, do you forgot you Password?
                     You send to us a request for a new password
                     Please, click here to change your password',
            'substitutionData'=>['name'=>$user->name],
            'subject'=>'Recovery your Password',
            'recipients'=>[
                [
                    'address'=>[
                        'name'=>$user->name,
                        'email'=>$user->email
                    ]
                ]
            ]
        ]);
    }
}
