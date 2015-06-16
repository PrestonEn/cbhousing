@extends('admin')

@section('content')

@foreach()
@endforeach

<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.requests').addClass('active');
</script>
@endsection