<form class="form-validate is-alter" method="post"
      action="{{ route(env('APP_PANEL') . '.' . $resource . ($editing ? '.update' : '.store'), $id) }}">
    @csrf
    @method($editing ? 'PUT' : 'POST')
    <div class="preview-block">
        <div class="row gy-4">

            @foreach($fields as $field)
                @php($type = $field['type'] ?? 'text')
                <div class="col-sm-{{ $field['col'] ?? 12 }}">
                    @switch($type)
                        @case('text')
                            <x-inputs.text
                                :id="$field['id'] ?? null"
                                :required="$field['required'] ?? ''"
                                :name="$field['index'] ?? ''"
                                :label="$field['title'] ?? ''"
                                :object="$object"
                            />
                            @break
                        @case('select')
                            <x-inputs.select
                                :id="$field['id'] ?? null"
                                :required="$field['required'] ?? ''"
                                :name="$field['index'] ?? ''"
                                :label="$field['title'] ?? ''"
                                :object="$object"
                                :list="$field['list'] ?? []"
                                :listIndex="$field['listIndex'] ?? ''"
                            />
                            @break
                    @endswitch

                </div>
            @endforeach

            {{ $slot }}

        </div>
        <hr>
        <button class="btn btn-success float-end">
            ثبت و ذخیره
        </button>
        <a href="{{ route(env('APP_PANEL') .'.'.$resource. '.index') }}"
           class="btn btn-warning float-end mx-1">
            بازگشت به لیست
        </a>
    </div>
</form>
