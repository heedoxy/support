@extends('layouts.master')
@php
    $editing = isset($object) && ! is_null($object->id);
    $object = $object ?? [];
    $id = $editing ? $object->id : 0;
    $section = "محتوا";
    $fields = [
        ['col'=>4, 'title'=>'عنوان','index'=>'title','required'=> true],
        ['col'=>4, 'title'=>'سامانه', 'id'=>'packageSelect', 'index' => 'package_id', 'type' => 'select', 'list' => $package ?? [], 'listIndex' => 'title', ],
        ['col'=>4, 'title'=>'دسته بندی', 'id'=>'categorySelect', 'type' => 'select'],
    ];
@endphp

@section('style')
    <link rel="stylesheet" href="./assets/css/editors/summernote.rtl.css"/>
    <style>
        form button {
            margin-right: auto;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="nk-content-body">
            <div class="components-preview mx-auto">
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
                        <div class="col-lg-12">
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <x-forms.resource
                                        :resource="$resource"
                                        :editing="$editing"
                                        :id="$id"
                                        :object="$object"
                                        :fields="$fields"
                                    >

                                        <div class="col-sm-12">
                                            <label for="content" class="d-none"></label>
                                            <textarea id="content" name="content" class="summernote-basic"
                                            >{{ $editing ? $object->content : '' }}</textarea>
                                        </div>

                                    </x-forms.resource>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="./assets/js/libs/editors/summernote.js"></script>
    <script>
        Niyam.SummerNote = function () {
            var _basic = '.summernote-basic';
            if ($(_basic).exists()) {
                $(_basic).each(function () {
                    $(this).summernote({
                        placeholder: 'محتوای خود را در این بخش وارد نمایید.',
                        tabsize: 2,
                        height: 400,
                        toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'strikethrough', 'clear']], ['font', ['superscript', 'subscript']], ['color', ['color']], ['fontsize', ['fontsize', 'height']], ['para', ['ul', 'ol', 'paragraph']], ['table', ['table']], ['insert', ['link', 'picture', 'video']], ['view', ['fullscreen', 'codeview', 'help']]]
                    });
                });
            }
        };
        Niyam.EditorInit = function () {
            Niyam.SummerNote();
        };
        Niyam.coms.docReady.push(Niyam.EditorInit);
    </script>

    <script>
        $('#packageSelect').change(function (e) {
            let categorySelect = $('#categorySelect');
            let packageId = e.target.value;
            let token = '@csrf';
            token = token.substr(42, 40);
            $.ajax({
                type: "get",
                url: `{{ route(env('APP_PANEL') . '.package.category') }}`,
                data: {
                    _token: token,
                    packageId: packageId
                },
                success: function(result){
                    categorySelect.empty();
                    categorySelect.append($("<option>").attr('value','').text(''));
                    result.forEach(function (record){
                        categorySelect.append($("<option>").attr('value',record.id).text(record.title));
                        console.log(record)
                    })
                },
                error: function (err) {
                    console.log($($(err.responseText)[1]).text())
                    debugger;
                }
            });
        });
    </script>

@endsection
