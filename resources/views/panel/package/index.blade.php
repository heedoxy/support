@extends('layouts.master')
@php
    $section = "سامانه ها";
    $columns = [
        ['index'=>'title','title'=>'عنوان'],
        ['index'=>'description','title'=>'توضیحات'],
    ];
@endphp
@section('content')
    <div class="container">
        <div class="nk-content-body">
            <div class="components-preview mx-auto">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">
                                لیست
                                {{ $section }}
                            </h4>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <a href="{{ route(env('APP_PANEL') .'.'.$resource. '.create') }}"
                               class="btn btn-success float-start">
                                ایجاد
                            </a>
                            <x-table.export
                                :resource="$resource"
                                :columns="$columns"
                                :list="$list"
                            />
                        </div>
                    </div>
                    <!-- .card-preview -->
                </div>
            </div>
        </div>
    </div>
@endsection
