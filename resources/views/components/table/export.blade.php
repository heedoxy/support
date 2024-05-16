@php
    $counter = 1;
@endphp

<table class="datatable-init-export nowrap table" data-export-title="خروجی">
    <thead>
    <tr class="nk-tb-item">
        <th>#</th>
        @foreach($columns as $column)
            <th>{{ $column['title'] }}</th>
        @endforeach
        <th></th>
    </tr>
    </thead>
    <tbody>

    @foreach($list as $record)
        <tr class="nk-tb-item">
            <td style="width: 50px">{{ $counter++ }}</td>
            @foreach($columns as $column)
                @isset($column['output'])
                    <td>{{ $column['output']($record) }}</td>
                @else
                    <td>{{ $record[$column['index']] }}</td>
                @endisset
            @endforeach
            <td>
                <ul class="nk-tb-actions gx-1">
                    <li class="nk-tb-action-hidden">
                        <a href="{{ route(env('APP_PANEL') . '.' . $resource . '.edit', $record['id'])  }}"
                           class="btn btn-info btn-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                           title="ویرایش رکورد">
                            <em class="icon ni ni-pen-alt-fill"></em>
                        </a>
                    </li>
                    <li class="nk-tb-action-hidden">
                        <form action="{{ route(env('APP_PANEL') . '.' . $resource . '.destroy', $record['id'])  }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-icon swt-remove"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="حذف رکورد">
                                <em class="icon ni ni-delete-fill"></em>
                            </button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
