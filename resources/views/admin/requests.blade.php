@extends('admin')

@section('content')

@foreach($data['requests'] as $req)
	{{$req->user_id}}
@endforeach

<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.requests').addClass('active');
</script>
@endsection