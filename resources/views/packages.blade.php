@php
    $_sidebar = false;
    $_header = false;
    $_footer = false;
@endphp

@extends('layouts.master')

@section('content')
    <div class="container-xl wide-xl pt-5 mt-5">
        <!-- .nk-block-head -->
        <div class="nk-block">
            <div class="row g-gs">
                <div class="col-sm-6 col-xxl-3 mb-3">
                    <a href="./" class="text-gray">
                        <em class="icon ni ni-home-fill"></em>
                        بازگشت
                    </a>
                </div>
            </div>
        </div>
        <div class="nk-content-body">
            <!-- .nk-page-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-sm-6 col-xxl-3">
                        <a href="./tags">
                            <div class="card card-full bg-indigo">
                                <div class="card-inner p-5">
                                    <h5 class="fs-1 text-white mx-auto text-center">
                                        <small>
                                            سامانه
                                        </small>
                                        MIS
                                    </h5>
                                    <br>
                                    <div class="fs-7 text-white text-opacity-75 mt-1 text-center">
                                    <span class="text-white">
                                        سیستم مدیریت اطلاعات
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- .card -->
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <a href="./tags">
                            <div class="card card-full bg-warning">
                                <div class="card-inner p-5">
                                    <h5 class="fs-1 text-white mx-auto text-center">
                                        <small>
                                            سامانه
                                        </small>
                                        GIS
                                    </h5>
                                    <br>
                                    <div class="fs-7 text-white text-opacity-75 mt-1 text-center">
                                    <span class="text-white">
                                        مدیریت اطلاعات مکانی
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- .card -->
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <a href="./tags">
                            <div class="card card-full bg-danger">
                                <div class="card-inner p-5">
                                    <h5 class="fs-1 text-white mx-auto text-center">
                                        <small>
                                            سامانه
                                        </small>
                                        AGMS
                                    </h5>
                                    <br>
                                    <div class="fs-7 text-white text-opacity-75 mt-1 text-center">
                                    <span class="text-white">
                                        مدیریت موافقت نامه ها
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- .card -->
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <a href="./tags">
                            <div class="card card-full bg-info">
                                <div class="card-inner p-5">
                                    <h5 class="fs-1 text-white mx-auto text-center">
                                        <small>
                                            سامانه
                                        </small>
                                        Budget
                                    </h5>
                                    <br>
                                    <div class="fs-7 text-white text-opacity-75 mt-1 text-center">
                                    <span class="text-white">
                                        سیستم مدیریت بودجه
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- .card -->
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .nk-block -->
        </div>
    </div>
@endsection
