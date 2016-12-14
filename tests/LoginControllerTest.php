<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class LoginControllerTest extends TestCase {

    use DatabaseTransactions;

    public static function login() {
        LoginControllerTest::register();

        $user = User::first();
        Auth::login($user, true);
    }

    public static function register() {
        $user = factory(User::class)->create([
                'name' => 'Teste',
                'email' => 'teste@teste.teste',
                'password' => hash('sha256', 'teste'),
                'creationDate' => '2016-12-8 13:02:00']
        );
        $user->save();
    }

    public function testLoginUserNotLoggedUrl() {
        $this->visit('/')->seePageIs('/');
    }

    public function testLoginUserNotLoggedPage() {
        $this->visit('/')->see('Sign in to start your session');
    }

    public function testLoginUserLoggedUrl() {
        LoginControllerTest::login();
        $this->visit('/')->seePageIs('/home');
    }

    public function testLoginUserLoggedPage() {
        LoginControllerTest::login();
        $this->visit('/')->see('Home');
    }

    public function testRegisterUserNotLoggedUrl() {
        $this->visit('/register')->seePageIs('/register');
    }

    public function testRegisterUserNotLoggedPage() {
        $this->visit('/register')->see('Register a new user');
    }

    public function testRegisterUserLoggedUrl() {
        LoginControllerTest::login();
        $this->visit('/register')->seePageIs('/home');
    }

    public function testRegisterUserLoggedPage() {
        LoginControllerTest::login();
        $this->visit('/register')->see('Home');
    }

    public function testRecoveryPasswordFail() {
        $this->visit('/recoveryPassword/1234567890')->seePageIs('/');
    }

    public function testLoginFormFailUrl() {
        $this->visit('/')->type('teste@teste.teste', 'email')->type('teste', 'password')->press('Sign In')->seePageIs('/loginUser');
    }

    public function testLoginFormEmailFail() {
        $this->visit('/')->type('teste@teste.teste', 'email')->type('teste', 'password')->press('Sign In')->see('Incorrect Email');
    }

    public function testLoginFormPasswordFail() {
        LoginControllerTest::register();
        $this->visit('/')->type('teste@teste.teste', 'email')->type('123456', 'password')->press('Sign In')->see('Incorrect Password');
    }

    public function testLoginFormSuccessUrl() {
        LoginControllerTest::register();
        $this->visit('/')->type('teste@teste.teste', 'email')->type('teste', 'password')->press('Sign In')->seePageIs('/home');
    }

    public function testLoginFormSuccessPage() {
        LoginControllerTest::register();
        $this->visit('/')->type('teste@teste.teste', 'email')->type('teste', 'password')->press('Sign In')->see('Home');
    }

    public function testLogoutUrl() {
        LoginControllerTest::login();
        $this->visit('/logout')->seePageIs('/');
    }

    public function testLogoutPage() {
        LoginControllerTest::login();
        $this->visit('/logout')->see('Sign in to start your session');
    }

    public function testUserNotLoggedUrl() {
        $this->visit('/userNotLogged')->seePageIs('/userNotLogged');
    }

    public function testUserNotLoggedPage() {
        $this->visit('/userNotLogged')->see('Please Sign in first');
    }

    public function testRegisterFormFailUrl() {
        $this->visit('/register')->type('Teste', 'nome')->type('teste@teste.teste', 'email')->type('teste', 'password')->type('etset', 'confirmPassword')->press('Register')->seePageIs('/newUser');
    }

    public function testRegisterFormFailEmail() {
        LoginControllerTest::register();
        $this->visit('/register')->type('Teste', 'nome')->type('teste@teste.teste', 'email')->type('teste', 'password')->type('teste', 'confirmPassword')->press('Register')->see('Email already registered');
    }

    public function testRegisterFormFailPassword() {
        $this->visit('/register')->type('Teste', 'nome')->type('teste@teste.teste', 'email')->type('teste', 'password')->type('etset', 'confirmPassword')->press('Register')->see('Passwords do not match');
    }

    public function testRegisterFormSuccessUrl() {
        $this->visit('/register')->type('Teste', 'nome')->type('teste@teste.teste', 'email')->type('teste', 'password')->type('teste', 'confirmPassword')->press('Register')->seePageIs('/home');
    }

    public function testRegisterFormSuccessPage() {
        $this->visit('/register')->type('Teste', 'nome')->type('teste@teste.teste', 'email')->type('teste', 'password')->type('teste', 'confirmPassword')->press('Register')->see('Home');
    }

    public function testForgotPasswordModal() {
        $this->visit('/')->click('Forgot password?')->see('Do you forgot your password?');
    }

    public function testForgotPasswordFail() {
        $this->visit('/')->click('Forgot password?')->type('teste@teste.teste', 'email')->press('Recover my Password')->see('Your e-mail to recover the password doesn\'t be registered');
    }
}
