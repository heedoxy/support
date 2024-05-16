<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\MainController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RegisterController extends MainController
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function register()
    {
        if ($this->params['password'] != $this->params['re-password']) {
            $this->danger('رمز عبور وارد شده و تکرار آن یکسان نیست');
            return Redirect::back();
        }

        $this->params['first_name'] = '';
        $this->params['last_name'] = '';
        $this->params['password'] = Hash::make($this->params['password']);

        User::create($this->params);
        $this->success('<h5>ثبت نام انجام شد.</h5><p>با مدیر سامانه تماس بگیرید</p>');
        return Redirect::route('login');
    }

}
