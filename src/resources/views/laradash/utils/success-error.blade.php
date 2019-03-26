@section('success-error')
    @if(session()->has('success'))
    <div class="alert alert-success">
        <span class="section-title">
            Success !!!
        </span> {{session()->get('success')}}
    </div>
    @endif

    @if(session()->has('error'))

    @endif
@endsection