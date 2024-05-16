@php
    $_sidebar = false;
    $_header = false;
    $_footer = false;
@endphp

@extends('layouts.master')

@section('style')
    <style>
        .nk-ibx-body {
            max-width: unset !important;
        }

        .nk-ibx-item-tools {
            margin-right: auto !important;
        }

        .nk-ibx-item-time {
            margin-right: auto !important;
            margin-left: unset !important;
            width: unset !important;
        }

    </style>
@endsection

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <x-buttons.back
                link="./packages/{{ $categoryId }}"
                icon="ni-home-fill"
                text="بازگشت"
            />
            <div class="nk-block">
                <h3 class="text-center">
                    دسته بندی :
                    {{ $category->title }}
                </h3>
                <div class="nk-ibx-body bg-white">
                    <div class="nk-ibx-head">
                        <div>
                            <ul class="nk-ibx-head-tools g-1">
                                <li>
                                    <a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search"
                                       data-target="search"><em class="icon ni ni-search"></em></a>
                                </li>
                                <li class="me-n1 d-lg-none">
                                    <a href="#" class="btn btn-trigger btn-icon toggle" data-target="inbox-aside"><em
                                            class="icon ni ni-menu-alt-r"></em></a>
                                </li>
                            </ul>
                        </div>
                        <div class="search-wrap" data-search="search">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em
                                        class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none"
                                       placeholder="متن مورد نظر خود را وارد نمایید ..."/>
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div>
                    </div>
                    <!-- .nk-ibx-head -->
                    <div class="nk-ibx-list" data-simplebar>
                        @foreach($list as $item)
                            <div class="nk-ibx-item ">
                                <a href="./guide/{{ $item->id }}" class="nk-ibx-link"></a>
                                <div class="nk-ibx-item-elem nk-ibx-item-user">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <img src="https://friconix.com/jpg/fi-cnsuxx-question-mark.jpg" alt=""/>
                                        </div>
                                        <div class="user-name">
                                            <div class="lead-text">{{ $item->title }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                <div class="nk-ibx-item-elem nk-ibx-item-time">
                                    <div class="sub-text">{{ $item->created_at_sh_date }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- .nk-ibx-list -->
                    <div class="nk-ibx-view">
                        <div class="nk-ibx-head">
                            <div class="nk-ibx-head-actions">
                                <ul class="nk-ibx-head-tools g-1">
                                    <li class="ms-n2">
                                        <a href="#" class="btn btn-icon btn-trigger nk-ibx-hide"><em
                                                class="icon ni ni-arrow-left"></em></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="بایگانی"><em
                                                class="icon ni ni-archived"></em></a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#" class="btn btn-icon btn-trigger btn-tooltip"
                                           title="علامت گذاری به عنوان هرزنامه"><em class="icon ni ni-report"></em></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="حذف"><em
                                                class="icon ni ni-trash"></em></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="برچسب"><em
                                                class="icon ni ni-label"></em></a>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                               data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                            <div class="dropdown-menu">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a class="dropdown-item" href="#"><span>علامت گذاری به عنوان خوانده نشده</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><span>علامت گذاری به عنوان غیر مهم</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><span>بایگانی این پیام</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="nk-ibx-head-actions">
                                <ul class="nk-ibx-head-tools g-1">
                                    <li class="d-none d-sm-block">
                                        <a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="قبلی"><em
                                                class="icon ni ni-chevron-left"></em></a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="بعدی"><em
                                                class="icon ni ni-chevron-right"></em></a>
                                    </li>
                                    <li class="me-n1 me-lg-0">
                                        <a href="#" class="btn btn-icon btn-trigger search-toggle toggle-search"
                                           data-target="search"><em class="icon ni ni-search"></em></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="search-wrap" data-search="search">
                                <div class="search-content">
                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em
                                            class="icon ni ni-arrow-left"></em></a>
                                    <input type="text" class="form-control border-transparent form-focus-none"
                                           placeholder="جستجو بر اساس کاربر یا پیام"/>
                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em>
                                    </button>
                                </div>
                            </div>
                            <!-- .search-wrap -->
                        </div>
                        <!-- .nk-ibx-head -->
                        <div class="nk-ibx-reply nk-reply" data-simplebar>
                            <div class="nk-ibx-reply-head">
                                <div>
                                    <h4 class="title">معرفی داشبورد جدید</h4>
                                    <ul class="nk-ibx-tags g-1">
                                        <li class="btn-group is-tags">
                                            <a class="btn btn-xs btn-primary btn-dim" href="#">کسب و کار</a>
                                            <a class="btn btn-xs btn-icon btn-primary btn-dim" href="#"><em
                                                    class="icon ni ni-cross"></em></a>
                                        </li>
                                        <li class="btn-group is-tags">
                                            <a class="btn btn-xs btn-danger btn-dim" href="#">مدیریت</a>
                                            <a class="btn btn-xs btn-icon btn-danger btn-dim" href="#"><em
                                                    class="icon ni ni-cross"></em></a>
                                        </li>
                                        <li class="btn-group is-tags">
                                            <a class="btn btn-xs btn-info btn-dim" href="#">تیم</a>
                                            <a class="btn btn-xs btn-icon btn-info btn-dim" href="#"><em
                                                    class="icon ni ni-cross"></em></a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="d-flex g-1">
                                    <li class="d-none d-sm-block">
                                        <a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="چاپ"><em
                                                class="icon ni ni-printer"></em></a>
                                    </li>
                                    <li class="me-n1">
                                        <div class="asterisk">
                                            <a class="btn btn-trigger btn-icon btn-tooltip" href="#"><em
                                                    class="asterisk-off icon ni ni-star"></em><em
                                                    class="asterisk-on icon ni ni-star-fill"></em></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="nk-ibx-reply-group">
                                <div class="nk-ibx-reply-item nk-reply-item">
                                    <div class="nk-reply-header nk-ibx-reply-header is-collapsed">
                                        <div class="nk-reply-desc">
                                            <div class="nk-reply-avatar user-avatar bg-blue">
                                                <span>ف‌ت</span>
                                            </div>
                                            <div class="nk-reply-info">
                                                <div class="nk-reply-author lead-text">فرشید ترنیان <span
                                                        class="date d-sm-none">21 آبان 1402</span></div>
                                                <div class="dropdown nk-reply-msg-info">
                                                    <a href="#" class="dropdown-toggle sub-text dropdown-indicator"
                                                       data-bs-toggle="dropdown">به آزیتا</a>
                                                    <div class="dropdown-menu dropdown-menu-md">
                                                        <ul class="nk-reply-msg-meta">
                                                            <li>
                                                                <span class="label">از:</span> <span class="info"><a
                                                                        href="#">someone@email.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">به:</span> <span class="info"><a
                                                                        href="#">team@yourwebsite.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">bcc:</span> <span class="info"><a
                                                                        href="#">team@yourwebsite.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">ایمیل شده توسط:</span> <span
                                                                    class="info"><a href="#">website.com</a></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="nk-reply-msg-excerpt">
                                                    من با مشکل روبرو هستم چون نمی تونم واحد پول رو در صفحه سفارش خرید
                                                    انتخاب کنم. بچه ها می تونید به من بگید که من چه کار اشتباهی انجام
                                                    میدم؟ لطفا فایل های پیوست رو بررسی کنید.
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nk-reply-tools g-1">
                                            <li class="attach-msg"><em class="icon ni ni-clip-h"></em></li>
                                            <li class="date-msg"><span class="date">21 آبان 1402</span></li>
                                            <li class="replyto-msg">
                                                <a href="#" class="btn btn-trigger btn-icon btn-tooltip"
                                                   title="پاسخ"><em class="icon ni ni-curve-up-left"></em></a>
                                            </li>
                                            <li class="more-actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-trigger btn-icon"
                                                       data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-reply-fill"></em><span>پاسخ به</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-forward-arrow-fill"></em><span>ارسال مجدد</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-trash-fill"></em><span>حذف</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-report-fill"></em><span>گزارش هرزنامه</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="nk-reply-body nk-ibx-reply-body">
                                        <div class="nk-reply-entry entry">
                                            <p>سلام تیم عزیز،</p>
                                            <p>من با مشکل روبرو هستم چون نمی تونم واحد پول رو در صفحه سفارش خرید انتخاب
                                                کنم. بچه ها می تونید به من بگید که من چه کار اشتباهی انجام میدم؟ لطفا
                                                فایل های پیوست رو بررسی کنید.</p>
                                            <p>
                                                با تشکر <br/>
                                                ترنیان
                                            </p>
                                        </div>
                                        <div class="attach-files">
                                            <ul class="attach-list">
                                                <li class="attach-item">
                                                    <a class="download" href="#"><em class="icon ni ni-img"></em><span>error-show-On-order.jpg</span></a>
                                                </li>
                                                <li class="attach-item">
                                                    <a class="download" href="#"><em class="icon ni ni-img"></em><span>full-page-error.jpg</span></a>
                                                </li>
                                            </ul>
                                            <div class="attach-foot">
                                                <span class="attach-info">2 فایل پیوست شده</span>
                                                <a class="attach-download link" href="#"><em
                                                        class="icon ni ni-download"></em><span>دانلود همه</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .nk-reply-item -->
                                <div class="nk-ibx-reply-item nk-reply-item">
                                    <div class="nk-reply-header nk-ibx-reply-header">
                                        <div class="nk-reply-desc">
                                            <div class="nk-reply-avatar user-avatar bg-blue">
                                                <img src="./images/avatar/c-sm.jpg" alt=""/>
                                            </div>
                                            <div class="nk-reply-info">
                                                <div class="nk-reply-author lead-text">آزیتا خسروی <span
                                                        class="date d-sm-none">30 آبان 1402</span></div>
                                                <div class="dropdown nk-reply-msg-info">
                                                    <a href="#" class="dropdown-toggle sub-text dropdown-indicator"
                                                       data-bs-toggle="dropdown">به من</a>
                                                    <div class="dropdown-menu dropdown-menu-md">
                                                        <ul class="nk-reply-msg-meta">
                                                            <li>
                                                                <span class="label">از:</span> <span class="info"><a
                                                                        href="#">someone@email.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">به:</span> <span class="info"><a
                                                                        href="#">team@yourwebsite.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">bcc:</span> <span class="info"><a
                                                                        href="#">team@yourwebsite.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">ایمیل شده توسط:</span> <span
                                                                    class="info"><a href="#">website.com</a></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="nk-reply-msg-excerpt">اگه برام بفرستی خیلی خوب میشه لورم
                                                    ایپسوم متن ساختگی با تولید سادگی...
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nk-reply-tools g-1">
                                            <li class="date-msg"><span class="date">21 آبان 1402</span></li>
                                            <li class="replyto-msg">
                                                <a href="#" class="btn btn-trigger btn-icon btn-tooltip"
                                                   title="پاسخ"><em class="icon ni ni-curve-up-left"></em></a>
                                            </li>
                                            <li class="more-actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-trigger btn-icon"
                                                       data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-reply-fill"></em><span>پاسخ به</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-forward-arrow-fill"></em><span>ارسال مجدد</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-trash-fill"></em><span>حذف</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-report-fill"></em><span>گزارش هرزنامه</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="nk-reply-body nk-ibx-reply-body">
                                        <div class="nk-reply-entry entry">
                                            <p>سلام تیم عزیز،</p>
                                            <p>من با مشکل روبرو هستم چون نمی تونم واحد پول رو در صفحه سفارش خرید انتخاب
                                                کنم. بچه ها می تونید به من بگید که من چه کار اشتباهی انجام میدم؟ لطفا
                                                فایل های پیوست رو بررسی کنید.</p>
                                            <p>
                                                با تشکر <br/>
                                                ترنیان
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- .nk-reply-item -->
                                <div class="nk-ibx-reply-item nk-reply-item">
                                    <div class="nk-reply-header nk-ibx-reply-header is-opened">
                                        <div class="nk-reply-desc">
                                            <div class="nk-reply-avatar user-avatar bg-blue">
                                                <span>ف‌ت</span>
                                            </div>
                                            <div class="nk-reply-info">
                                                <div class="nk-reply-author lead-text">فرشید ترنیان <span
                                                        class="date d-sm-none">05 آذر 1402</span></div>
                                                <div class="dropdown nk-reply-msg-info">
                                                    <a href="#" class="dropdown-toggle sub-text dropdown-indicator"
                                                       data-bs-toggle="dropdown">به آزیتا</a>
                                                    <div class="dropdown-menu dropdown-menu-md">
                                                        <ul class="nk-reply-msg-meta">
                                                            <li>
                                                                <span class="label">از:</span> <span class="info"><a
                                                                        href="#">someone@email.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">به:</span> <span class="info"><a
                                                                        href="#">team@yourwebsite.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">bcc:</span> <span class="info"><a
                                                                        href="#">team@yourwebsite.com</a></span>
                                                            </li>
                                                            <li>
                                                                <span class="label">ایمیل شده توسط:</span> <span
                                                                    class="info"><a href="#">website.com</a></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="nk-reply-msg-excerpt">اگه برام بفرستی خیلی خوب میشه لورم
                                                    ایپسوم متن ساختگی با تولید سادگی...
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nk-reply-tools g-1">
                                            <li class="date-msg"><span class="date">21 آبان 1402</span></li>
                                            <li class="replyto-msg">
                                                <a href="#" class="btn btn-trigger btn-icon btn-tooltip"
                                                   title="پاسخ"><em class="icon ni ni-curve-up-left"></em></a>
                                            </li>
                                            <li class="more-actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-trigger btn-icon"
                                                       data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-reply-fill"></em><span>پاسخ به</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-forward-arrow-fill"></em><span>ارسال مجدد</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-trash-fill"></em><span>حذف</span></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><em
                                                                        class="icon ni ni-report-fill"></em><span>گزارش هرزنامه</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="nk-reply-body nk-ibx-reply-body">
                                        <div class="nk-reply-entry entry">
                                            <p>سلام تیم عزیز،</p>
                                            <p>من با مشکل روبرو هستم چون نمی تونم واحد پول رو در صفحه سفارش خرید انتخاب
                                                کنم. بچه ها می تونید به من بگید که من چه کار اشتباهی انجام میدم؟ لطفا
                                                فایل های پیوست رو بررسی کنید.</p>
                                            <p>
                                                با تشکر <br/>
                                                ترنیان
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- .nk-reply-item -->
                            </div>
                            <div class="nk-ibx-reply-form nk-reply-form">
                                <div class="nk-reply-form-header">
                                    <div class="nk-reply-form-group">
                                        <div class="nk-reply-form-dropdown">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-trigger btn-icon" data-bs-toggle="dropdown"
                                                   href="#"><em class="icon ni ni-curve-up-left"></em></a>
                                                <div class="dropdown-menu dropdown-menu-md">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a class="dropdown-item" href="#"><em
                                                                    class="icon ni ni-reply-fill"></em> <span>پاسخ به فرشید ترنیان</span></a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><em
                                                                    class="icon ni ni-forward-arrow-fill"></em> <span>ارسال مجدد</span></a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="#"><em class="icon ni ni-edit-fill"></em> <span>ویرایش موضوع</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-reply-form-title d-sm-none">پاسخ</div>
                                        <div class="nk-reply-form-input-group">
                                            <div class="nk-reply-form-input nk-reply-form-input-to">
                                                <label class="label">به</label>
                                                <input type="text" value="your@email.com" class="input-mail tagify"
                                                       placeholder=""
                                                       data-whitelist="team@yourwebsite.com, help@yourwebsite.com, contact@yourwebsite.com"/>
                                            </div>
                                            <div class="nk-reply-form-input nk-reply-form-input-cc"
                                                 data-content="mail-cc">
                                                <label class="label">Cc</label>
                                                <input type="text" class="input-mail tagify"/>
                                                <a href="#" class="toggle-opt" data-target="mail-cc"><em
                                                        class="icon ni ni-cross"></em></a>
                                            </div>
                                            <div class="nk-reply-form-input nk-reply-form-input-bcc"
                                                 data-content="mail-bcc">
                                                <label class="label">Bcc</label>
                                                <input type="text" class="input-mail tagify"/>
                                                <a href="#" class="toggle-opt" data-target="mail-bcc"><em
                                                        class="icon ni ni-cross"></em></a>
                                            </div>
                                        </div>
                                        <ul class="nk-reply-form-nav">
                                            <li><a tabindex="-1" class="toggle-opt" data-target="mail-cc"
                                                   href="#">CC</a></li>
                                            <li><a tabindex="-1" class="toggle-opt" data-target="mail-bcc"
                                                   href="#">BCC</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="nk-reply-form-editor">
                                    <div class="nk-reply-form-field">
                                        <textarea class="form-control form-control-simple no-resize"
                                                  placeholder="سلام"></textarea>
                                    </div>
                                </div>
                                <!-- .nk-reply-form-editor -->
                                <div class="nk-reply-form-tools">
                                    <ul class="nk-reply-form-actions g-1">
                                        <li class="me-2">
                                            <button class="btn btn-primary" type="submit">ارسال</button>
                                        </li>
                                        <li>
                                            <div class="dropdown">
                                                <a class="btn btn-icon btn-sm" data-bs-toggle="dropdown" href="#"><em
                                                        class="icon ni ni-hash" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="الگوها"></em></a>
                                                <div class="dropdown-menu">
                                                    <ul class="link-list-opt no-bdr link-list-template">
                                                        <li class="opt-head"><span>درج سریع</span></li>
                                                        <li>
                                                            <a href="#"><span>پیام تشکر</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>مشکلات شما حل شد</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>پیام تشکر</span></a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="#"><em class="icon ni ni-file-plus"></em><span>ذخیره به عنوان الگو</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><em class="icon ni ni-notes-alt"></em><span>مدیریت الگوها</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="btn btn-icon btn-sm" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="آپلود پیوست" href="#"><em
                                                    class="icon ni ni-clip-v"></em></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-icon btn-sm" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="آپلود تصاویر" href="#"><em
                                                    class="icon ni ni-img"></em></a>
                                        </li>
                                    </ul>
                                    <ul class="nk-reply-form-actions g-1">
                                        <li>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn-trigger btn btn-icon"
                                                   data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#"><span>یک تنظیم دیگر</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>تنظیمات بیشتر</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-trigger btn btn-icon me-n2"><em
                                                    class="icon ni ni-trash"></em></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- .nk-reply-form-tools -->
                            </div>
                            <!-- .nk-reply-form -->
                        </div>
                        <!-- .nk-reply -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
