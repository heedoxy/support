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
                    پیمان پردازش نیام
                </a>
            </div>
            <div class="card">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content text-center">
                            <h4 class="nk-block-title">ثبت نام</h4>
                        </div>
                    </div>
                    <form class="form-validate is-alter" action="{{ route('register.post') }}" method="post">

                        @method('post')
                        @csrf

                        <x-inputs.text
                            required
                            name="username"
                            label="نام کاربری"
                            placeholder="یک نام کاربری برای خود انتخاب نمایید"
                        />

                        <x-inputs.text
                            required
                            name="phone"
                            label="شماره تماس"
                            placeholder="شماره تماس خود را وارد نمایدد"
                        />

                        <x-inputs.password
                            required
                            name="password"
                            label="رمز عبور"
                            placeholder="رمز عبور خود را وارد کنید"
                        />

                        <x-inputs.password
                            required
                            name="re-password"
                            label="تکرار رمز عبور"
                            placeholder="تکرار رمز عبور خود را وارد کنید"
                        />

                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">ثبت نام</button>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4">
                        حساب کاربری دارید؟
                        <a href="{{ route('login') }}">
                            وارد شوید
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
