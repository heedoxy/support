@foreach (['error', 'warning', 'success', 'info'] as $message)
    @if(Session::has('alert-' . $message))
        <script>
            Niyam.Toast('{!! Session::get('alert-' . $message) !!}', '{{ $message }}')
        </script>
    @endif
@endforeach
