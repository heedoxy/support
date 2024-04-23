@php
    $_sidebar = false;
    $_header = false;
    $_footer = false;
@endphp

@extends('layouts.master')

@section('style')
    <style>
        .wide-xs {
            max-width: 1000px !important;
        }

        .nk-error-head {
            font-size: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="nk-block nk-block-middle wide-xs mx-auto">
        <div class="nk-block-content nk-error-ld text-center">
            <h1 class="nk-error-head">پیمان پردازش نیام</h1>
            <br><br><br>
            <h3 class="nk-error-title">سامانه آموزش و راهنما</h3>
            <br>
            <p class="nk-error-text">شما به کمک این سامانه میتوانید با دستیابی به آموزش همه سامانه ها،
                تسلطی نسبی کسب کنید.</p>
            <a href="/packages" class="btn btn-lg btn-primary mt-2">ورود به سامانه</a>
        </div>
    </div>
@endsection
