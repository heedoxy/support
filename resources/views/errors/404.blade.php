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
            <h1 class="nk-error-head">404</h1>
            <h3 class="nk-error-title">یافت نشد</h3>
        </div>
    </div>
@endsection
