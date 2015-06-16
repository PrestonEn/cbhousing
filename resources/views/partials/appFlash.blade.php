@section('appFlash')    
    <div class='container'>
        @if(Session::has('sent'))
            <div class='alert alert-success'>
                {{Session::get('sent')}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif
    </div>
@endsection