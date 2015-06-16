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
                {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'landlords','method'=>'POST', 'files'=>true)) !!}
                    <div class="form-group">
                      <label class="col-md-4 control-label">Landlord Name</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                      </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="col-md-4 control-label">Landlord Email</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Landlord Phone</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                      </div>
                    </div>
                    
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}              
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
@foreach($landlords as $lord)
  <section class="active-list">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">{!! $lord->name!!}</div>
            <div class="panel-body">
              <div class='row'>
                <div class="col-md-6">
                  <h3>{!!$lord->email!!}  
                </div>
                <div class="col-md-3">
                  <h3>{!!$lord->phone!!}  
                </div>
                <div class="col-md-3">
                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'landlords/destroy/'.$lord->id,'method'=>'post')) !!}
                      {!! Form::submit('Delete', array('class'=>'btn btn-alrt')) !!}              
                  {!! Form::close() !!}

                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'admin/updateLandlord/'.$lord->id,'method'=>'GET')) !!}
                      {!! Form::submit('Edit Landlord', array('class'=>'btn btn-primary')) !!}        
                  {!! Form::close() !!}
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endforeach



<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.landlords').addClass('active');
</script>
@endsection