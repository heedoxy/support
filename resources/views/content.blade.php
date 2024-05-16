@php
    $_sidebar = false;
    $_header = false;
    $_footer = false;
    $_editing = isset($object);
    $_object = $object ?? (object) [];
@endphp

@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="./assets/css/editors/summernote.rtl.css"/>
    <style>
        form button {
            margin-right: auto;
        }
    </style>
@endsection

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="components-preview wide-xl mx-auto">
                <x-buttons.back
                    link="./tags"
                    text="مشاهده پکیج"
                />
                <!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <form method="post"
                          action="{{  $_editing ? route('content.update', $_object->id) : route('content.store') }}">
                        @csrf
                        @method($_editing ? 'PUT' : 'POST')
                        <div class="card">
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="title nk-block-title"></h4>
                                    </div>
                                </div>
                                <label for="content"></label>
                                <textarea id="content" name="content" class="summernote-basic"
                                >{{ $editing ? $object->content : '' }}</textarea>
                                <button class="btn btn-wider btn-primary mt-2">
                                    <span>ثبت و ذخیره محتوا</span>
                                    <em class="icon ni ni-arrow-right"></em>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- .nk-block -->
            </div>
            <!-- .components-preview -->
        </div>
    </div>
@endsection

@section('script')
    <script src="./assets/js/libs/editors/summernote.js"></script>
    <script src="./assets/js/editors.js"></script>
@endsection
