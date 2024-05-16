@php
    $id = $id ?? 'id-' . rand(1000, 9999)
@endphp

<div class="form-group">
    <div class="form-label-group">
        <label class="form-label" for="{{ $id }}">
            @if(isset($required))
                <span class="text-danger"> * </span>
            @endif
            {{ $title ?? '' }}
        </label>
        {{--        <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">رمز عبور--}}
        {{--            را فراموش کردید؟</a>--}}
    </div>
    <div class="form-control-wrap">
        <a href="#" class="form-icon form-icon-right passcode-switch lg is-hidden" tabindex="-1"
           data-target="{{ $id }}">
            <em class="passcode-icon icon-show icon ni ni-eye"></em>
            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
        </a>
        <input type="password" class="form-control form-control-lg"
               {{ isset($required) ? 'required' : '' }}
               {{ isset($readonly) ? 'readonly' : '' }}
               id="{{ $id }}"
               name="{{ $name ?? '' }}"
               placeholder="{{ $placeholder ?? '' }}">
    </div>
</div>

