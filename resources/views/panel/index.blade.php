@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="./assets/css/libs/jstree.css"/>
@endsection

@section('content')
    <div class="nk-content-body">
        <div class="content-page wide-sm m-auto">
            <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                <div class="nk-block-head-content text-center">
                    <div class="nk-block-des">
                        <p class="lead">
                            ساختار در یک نگاه
                        </p>
                    </div>
                </div>
            </div>
            <!-- .nk-block-head -->
            <div class="card card-preview">
                <div class="card-inner">
                    <div id="custom-icon-tree">
                        <ul>
                            @foreach($packages as $package)
                                <li data-jstree='{ "opened" : true }'>
                                    {{ $package->title }}
                                    <ul>
                                        @foreach($package->category as $category)
                                        <li data-jstree='{ "icon" : "icon ni ni-puzzle-fill text-{{ $category->class }}" }'>{{ $category->title }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <!-- .content-page -->
    </div>
@endsection

@section('script')
    <script src="./assets/js/libs/jstree.js"></script>
    <script>
        $("#custom-icon-tree").jstree({
            "core": {
                "themes": {
                    "responsive": false
                }
            }
        });
    </script>
@endsection
