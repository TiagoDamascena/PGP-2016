<?php


use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testUserNotLoggedLink() {
        $this->visit('/tasks')->seePageIs('/userNotLogged');
    }

    public function testUserNotLoggedPage() {
        $this->visit('/tasks')->see('Please Sign in first');
    }

    public function testUserLoggedLink() {
        LoginControllerTest::login();
        $this->visit('/tasks')->seePageIs('/tasks');
    }

    public function testUserLoggedPage() {
        LoginControllerTest::login();
        $this->visit('/tasks')->see('Tasks');
    }
}
