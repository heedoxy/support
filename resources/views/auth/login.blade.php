@extends('layouts.blank')

@section('style')
    <style>
        .nk-error-head {
            font-size: 50px !important;
        }
    </style>
@endsection

@section('content')
    <div class="nk-content">
        <div class="nk-block nk-block-middle nk-auth-body wide-xs">
            <div class="brand-logo pb-4 text-center">
                <a href="/" class="logo-link nk-error-head">
                    {{ env('APP_NAME') }}
                </a>
            </div>
            <div class="card">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content text-center">
                            <h4 class="nk-block-title">ورود</h4>
                        </div>
                    </div>
                    <form class="form-validate is-alter" action="{{ route('login.post') }}" method="post">

                        @method('post')
                        @csrf

                        <x-inputs.text
                            required
                            name="username"
                            label="شماره تماس یا نام کاربری"
                            placeholder="شماره تماس یا نام کاربری خود را وارد کنید"
                        />

                        <x-inputs.password
                            required
                            name="password"
                            label="رمز عبور"
                            placeholder="رمز عبور خود را وارد کنید"
                        />

                        <x-inputs.switch
                            name="remember-me"
                            title="مرا به خاطر بسپار"
                        />

                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">ورود</button>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4">
                        حساب کاربری ندارید؟
                        <a href="{{ route('register') }}">
                            ثبت نام کنید
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
