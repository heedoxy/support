<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/copywriter/index.html" class="logo-link nk-sidebar-logo">
                <h5 class="nk-error-head" style="font-size: 20px">
                    {{ env('APP_NAME') }}
                </h5>
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
        </div>
    </div>
    <!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route($_panel . '.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text">خانه</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route($_panel . '.package.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-puzzle-fill"></em></span>
                            <span class="nk-menu-text">سامانه ها</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route($_panel . '.category.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-list-fill"></em></span>
                            <span class="nk-menu-text">دسته بندی ها</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route($_panel . '.content.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-folder-fill"></em></span>
                            <span class="nk-menu-text">محتوا</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('logout') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-power"></em></span>
                            <span class="nk-menu-text">خروج</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
