@php
    $_sidebar = false;
    $_header = false;
    $_footer = false;
    $_list = $list ?? [];
@endphp

@extends('layouts.master')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <x-buttons.back
                link="./"
                icon="ni-home-fill"
                text="بازگشت به خانه"
            />
            <div class="nk-block">
                <div class="row g-gs">

                    @foreach($_list as $item)
                        <div class="col-sm-6 col-xxl-3">
                            <a href="./packages/{{ $item->id }}">
                                <div class="card card-full {{ $item->class }}">
                                    <div class="card-inner p-5">
                                        <h5 class="fs-1 text-white mx-auto text-center">
                                            <small>
                                                سامانه
                                            </small>
                                            {{ $item->title }}
                                        </h5>
                                        <br>
                                        <div class="fs-7 text-white text-opacity-75 mt-1 text-center">
                                    <span class="text-white">
                                        {{ $item->description }}
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- .card -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
