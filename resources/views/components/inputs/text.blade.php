@php
    $id = $id ?? 'id-' . rand(1000, 9999)
@endphp

<div class="form-group">
    <div class="form-label-group">
        <label class="form-label" for="{{ $id }}">
            @if(isset($required) && $required)
                <span class="text-danger"> * </span>
            @endif
            {{ $label ?? '' }}
        </label>
    </div>
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-lg"
               {{ isset($required) && $required ? 'required' : '' }}
               {{ isset($readonly) && $readonly ? 'readonly' : '' }}
               id="{{ $id }}"
               name="{{ $name ?? '' }}"
               placeholder="{{ $placeholder ?? '' }}"
                value="{{ isset($object) && $object != null ? $object[$name] : '' }}"
        >
    </div>
</div>

