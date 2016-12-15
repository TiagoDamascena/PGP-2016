<?php

use App\SchoolYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ScheduleControllerTest extends TestCase {

    use DatabaseTransactions;

    public static function newYear() {
        LoginControllerTest::login();

        $year = new SchoolYear();
        $year->owner = Auth::user()->id;
        $year->name = '2015';
        $year->start_date = '2015-03-07';
        $year->end_date = '2015-12-16';
        $year->save();
    }

    public function testUserLoggedUrl() {
        LoginControllerTest::login();
        $this->visit('/schedule')->seePageIs('/schedule');
    }

    public function testUserLoggedPage() {
        LoginControllerTest::login();
        $this->visit('/schedule')->see('Schedule');
    }

    public function testUserNotLoggedUrl() {
        $this->visit('/schedule')->seePageIs('/userNotLogged');
    }

    public function testUserNotLoggedPage() {
        $this->visit('/schedule')->see('Please Sign in first');
    }

    public function testGetYears() {
        ScheduleControllerTest::newYear();
        $this->visit('/getYears')->seeJson([
            'id' => 1,
            'owner' => 1,
            'name' => '2015',
            'start_date' => '2015-03-07',
            'end_date' => '2015-12-16',
            'created_at' => null,
            'updated_at' => null
        ]);
    }
}
