<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class LoginControllerTest extends TestCase {

    use DatabaseTransactions;

    public static function login() {
        $user = factory(User::class)->create([
            'email' => 'teste@teste.teste',
            'password' => 'teste',
            'name' => 'Teste',
            'creationDate' => '2016-12-8 13:02:00']
        );

        Auth::login($user, true);
    }

    public function testLoginUserNotLoggedUrl() {
        $this->visit('/')->seePageIs('/');
    }

    public function testLoginUserNotLoggedPage() {
        $this->visit('/')->see('Sign in to start your session');
    }
}
