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
        LoginControllerTest::login();
        $this->visit('/home')->seePageIs('/home');
    }

    public function testUserLoggedPage() {
        LoginControllerTest::login();
        $this->visit('/home')->see('Home');
    }
}
