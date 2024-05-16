@extends('layouts.master')
@php
    $editing = isset($object) && ! is_null($object->id);
    $object = $object ?? [];
    $id = $editing ? $object->id : 0;
    $section = "سامانه";
    $fields = [
        ['index'=>'title','title'=>'عنوان'],
        ['index'=>'description','title'=>'توضیحات'],
        ['index'=>'class','title'=>'کلاس'],
    ];
@endphp
@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="components-preview wide-xl mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">
                                    {{ $editing ? ' ویرایش ' : ' ایجاد ' }}
                                    {{ $section }}
                                </h4>
                            </div>
                        </div>
                        <div class="row g-gs">
                            <div class="col-lg-6">
                                <div class="card card-preview">
                                    <div class="card-inner">
                                        <x-forms.resource
                                            :resource="$resource"
                                            :editing="$editing"
                                            :id="$id"
                                            :object="$object"
                                            :fields="$fields"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
