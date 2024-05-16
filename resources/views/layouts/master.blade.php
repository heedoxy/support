@php

    $_title = $_title ?? 'پیمان پردازش نیام';
    $_sidebar = $_sidebar ?? true;
    $_header = $_header ?? false;
    $_footer = $_footer ?? false;
    $_panel = env('APP_PANEL')

@endphp

<!DOCTYPE html>
<html lang="fa" class="js">
<head>
    <base href="../../../"/>
    <meta charset="utf-8"/>
    <meta name="author" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png"/>
    <!-- Page Title  -->
    <title>{{ $_title }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.rtl.css"/>
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css"/>

    @yield('style')

</head>

<body class="has-rtl nk-body ui-rounder npc-general pg-error" dir="rtl">

<!-- app-root @e -->
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main">

        @if($_sidebar)
            @include('layouts.sidebar')
        @endif

        <!-- wrap @s -->
        <div class="nk-wrap {{ $_sidebar ? '' : 'nk-wrap-nosidebar' }}">

            @if($_header)
                @include('layouts.header')
            @endif

            <!-- content @s -->
            <div class="nk-content nk-content-fluid">
                @yield('content')
            </div>
            <!-- content @e -->

            @if($_footer)
                @include('layouts.footer')
            @endif

        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->

<!-- select region modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="region">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">کشور خود را انتخاب کنید</h5>
                <div class="nk-country-region">
                    <ul class="country-list text-center gy-2">
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/arg.png" alt="" class="country-flag"/>
                                <span class="country-name">آرژانتین</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/aus.png" alt="" class="country-flag"/>
                                <span class="country-name">استرالیا</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/bangladesh.png" alt="" class="country-flag"/>
                                <span class="country-name">بنگلادش</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/canada.png" alt="" class="country-flag"/>
                                <span class="country-name">کانادا <small>(انگلیسی)</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/s-africa.png" alt="" class="country-flag"/>
                                <span class="country-name">سانترافریکائین</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/china.png" alt="" class="country-flag"/>
                                <span class="country-name">چین</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/french.png" alt="" class="country-flag"/>
                                <span class="country-name">فرانسه</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/germany.png" alt="" class="country-flag"/>
                                <span class="country-name">آلمان</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/iran.png" alt="" class="country-flag"/>
                                <span class="country-name">ایران</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/italy.png" alt="" class="country-flag"/>
                                <span class="country-name">ایتالیا</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/mexico.png" alt="" class="country-flag"/>
                                <span class="country-name">مکزیک</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/philipine.png" alt="" class="country-flag"/>
                                <span class="country-name">فیلیپین</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/portugal.png" alt="" class="country-flag"/>
                                <span class="country-name">پرتقال</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/s-africa.png" alt="" class="country-flag"/>
                                <span class="country-name">آفریقای جنوبی</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/spanish.png" alt="" class="country-flag"/>
                                <span class="country-name">اسپانیا</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/switzerland.png" alt="" class="country-flag"/>
                                <span class="country-name">سوئیس</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/uk.png" alt="" class="country-flag"/>
                                <span class="country-name">انگلستان</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/english.png" alt="" class="country-flag"/>
                                <span class="country-name">ایالات متحده آمریکا</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
</div>

<!-- JavaScript -->
<script src="./assets/js/bundle.js"></script>
<script src="./assets/js/scripts.js"></script>
<script src="./assets/js/libs/datatable-btns.js"></script>
<script src="./assets/js/example-sweetalert.js"></script>

@include('layouts.toastr')
@yield('script')

</body>
</html>
