@extends('admin')




@section('content')
    @foreach($users as $user)
       <div class="row">
            
       </div>
    @endforeach
<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.users').addClass('active');
</script>
@endsection