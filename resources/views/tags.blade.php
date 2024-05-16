@php
    $_sidebar = false;
    $_header = false;
    $_footer = false;
@endphp

@extends('layouts.master')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <x-buttons.back
                link="./packages"
                text="مشاهده سامانه ها"
            />
            <div class="nk-block nk-block-lg">
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="example-alerts">
                            <div class="gy-4">
                                <a href="./guide" class="mx-1">
                                    <div class="example-alert">
                                        <div class="alert alert-fill alert-secondary alert-icon text-center">
                                            <em class="icon ni ni-alert-circle"></em>
                                            شرح خدمات
                                        </div>
                                    </div>
                                </a>
                                <a href="./guide" class="mx-1">
                                    <div class="example-alert">
                                        <div class="alert alert-fill alert-secondary alert-icon text-center">
                                            <em class="icon ni ni-alert-circle"></em>
                                            آموزش های کاربری
                                        </div>
                                    </div>
                                </a>
                                <a href="./guide" class="mx-1">
                                    <div class="example-alert">
                                        <div class="alert alert-fill alert-secondary alert-icon text-center">
                                            <em class="icon ni ni-alert-circle"></em>
                                            راهنمای سامانه
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
