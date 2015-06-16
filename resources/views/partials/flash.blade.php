@section('flash')    
    <div class='container'>
        @if(Session::has('added'))
            <div class='alert alert-success'>
                {{Session::get('added')}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif
    </div>
@endsection