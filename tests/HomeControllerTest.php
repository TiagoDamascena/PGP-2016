<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase {

    public function testUserNotLogged() {
        $this->visit('/home')->see('Please Sign in first');
    }

    public function testUserLogged() {

        $this->visit('/home')->see('Please Sign in first');
    }
}
