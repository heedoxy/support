<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\MainController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends MainController
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function login()
    {
        $user = User::query()
                ->where('username', $this->params['username'])
                ->orWhere('phone', $this->params['username'])
                ->first();
        if ($user) {
            if (Hash::check($this->params['password'], $user->password)) {
                if ($user->is_active) {
                    auth()->login($user, (bool)$this->request->get('remember-me', false));
                    return Redirect::route($this->panel . '.index');
                } else {
                    $this->error('<h5>کاربری شما فعال نیست</h5><p>با مدیر سامانه تماس بگیرید</p>');
                    return Redirect::back();
                }
            } else {
                $this->error('نام کاربری و یا رمز عبور اشتباه میباشد');
                return Redirect::back();
            }
        } else {
            $this->error('نام کاربری و یا رمز عبور اشتباه میباشد');
            return Redirect::back();
        }
    }

    public function logout()
    {
        auth()->logout();
        $this->success('با موفقیت خارج شدید.');
        return redirect()->route('login');
    }

}
