@extends('admin')

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Add A Landlord</div>
            <div class="panel-body">
                        @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
              <div class="control-group">
                <div class="controls">                    
                {!! Form::model($landlord, array('class'=>"form-horizontal", 'role'=>"form",'url'=>'landlords/edit/'.$landlord->id,'method'=>'PATCH', 'files'=>true)) !!}
                    <div class="form-group">
                      <label class="col-md-4 control-label">Landlord Name</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{ $landlord->name }}">
                      </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="col-md-4 control-label">Landlord Email</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="email" value="{{ $landlord->email}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Landlord Phone</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="phone" value="{{  $landlord->phone }}">
                      </div>
                    </div>
                    
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      {!! Form::submit('update', array('class'=>'btn btn-primary')) !!}              
                    </div>
                  </div>
                {!! Form::close() !!}

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.landlords').addClass('active');
</script>
@endsection