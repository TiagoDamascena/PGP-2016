<?php

namespace App\Jobs;

use App\Change_password;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Ivory\HttpAdapter\Guzzle6HttpAdapter;
use SparkPost\SparkPost;

class Sender
{
    private $spark;
    private static $API_KEY = 'a7e0dbb90759924ebbe54b0cac6f40eca6655016';

    public function __construct()
    {
        $client = new Client();
        $httpAdapter = new Guzzle6HttpAdapter($client);
        $this->spark = new SparkPost($httpAdapter,['key'=>self::$API_KEY]);
    }

    public function send($user){
        $changePass = Change_password::where('user',$user->id)->first();
        if (!$changePass){
            $changePass = new Change_password();
            $changePass->unique_key = (md5($user.date("Y-m-d H:i:s")));
            $changePass->user = $user->id;
            $changePass->save();
        }
        else{
            $changePass->unique_key = (md5($user.date("Y-m-d H:i:s")));
            $changePass->save();
        }

        $url = url('/recoveryPassword/'.$changePass->unique_key);
        $this->spark->transmission->send([
            'from'=>[
                'name' => 'StudyEach',
                'email' => 'from@sparkpostbox.com>'
            ],
            'html'=> view('MailRecovery', compact('user','url'))->render(),
            'text'=>'Hello, do you forgot you Password?
                     You send to us a request for a new password
                     Please, click here to recover your password',
            'subject'=>'Recover your Password',
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
