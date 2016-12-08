<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class HomeControllerTest extends TestCase {

    use DatabaseTransactions;

    public function testUserNotLoggedLink() {
        $this->visit('/home')->seePageIs('/userNotLogged');
    }

    public function testUserNotLoggedPage() {
        $this->visit('/home')->see('Please Sign in first');
    }

    public function testUserLoggedLink() {
        $this->login();
        $this->visit('/home')->seePageIs('/home');
    }

    public function testUserLoggedPage() {
        $this->login();
        $this->visit('/home')->see('Home');
    }

    private function login() {
        $user = factory(\App\User::class)->create(
            ['email' => 'teste@teste.teste',
                'password' => 'teste',
                'name' => 'Teste',
                'creationDate' => '2016-12-8 13:02:00']
        );

        Auth::login($user, true);
    }

}
