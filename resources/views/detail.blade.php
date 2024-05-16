@php
    $_sidebar = false;
    $_header = false;
    $_footer = false;
    $_object = $object ?? (object) [];
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
                                @foreach($_object->category as $category)
                                    <a href="./category/{{ $category->id }}" class="mx-1">
                                        <div class="example-alert">
                                            <div class="alert alert-fill alert-{{ $category->class }} alert-icon text-center">
                                                <em class="icon ni ni-alert-circle"></em>
                                                {{ $category->title }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
