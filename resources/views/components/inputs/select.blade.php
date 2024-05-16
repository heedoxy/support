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
        <select class="form-select js-select2"
                id="{{ $id }}"
                name="{{ $name ?? '' }}"
                data-ui="lg"
                data-placeholder="{{ $placeholder ?? 'انتخاب کنید' }}"
            {{ isset($required) && $required ? 'required' : '' }}
            {{ isset($readonly) && $readonly ? 'readonly' : '' }}
        >
            <option value="">{{ $placeholder ?? 'انتخاب کنید' }}</option>
            @foreach($list as $record)
                <option value="{{ $record['id'] }}"
                    {{ isset($object) && $object != null && $object[$name] == $record['id'] ? 'selected' : '' }}
                >
                    {{ $record[$listIndex] }}
                </option>
            @endforeach
        </select>
        {{--        <input type="text" class="form-control form-control-lg">--}}
    </div>
</div>

