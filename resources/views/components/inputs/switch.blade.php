@php
    $id = $id ?? 'id-' . rand(1000, 9999)
@endphp

<div class="form-group">
    <div class="form-control-wrap">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input"
                   name="{{ $name ?? '' }}"
                   id="{{ $id }}">
            <label class="custom-control-label" for="{{ $id }}">
                {{ $title ?? '' }}
            </label>
        </div>
    </div>
</div>

