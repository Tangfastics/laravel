<?php

namespace Tangfastics\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        $this->view('auth.login');
    }

    public function postLogin()
    {
        $credentials = Input::only(['username', 'password']);
        $remember = Input::get('remember_me', false);

        if (str_contains($credentials['username'], '@')) {
            $credentials['email'] = $credentials['username'];
            unset($credentials['username']);
        }

        if (Auth::attempt($credentials, $remember)) {
            return Redirect::intended(route('home'))->withMessage('You have been logged in successfully');
        }

        return Redirect::back()->withError('Incorrect Username or Password');
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::route('home')->withMessage('You have been logged out successfully.');
    }
}