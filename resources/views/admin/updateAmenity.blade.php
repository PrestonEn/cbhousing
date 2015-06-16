  @extends('admin')
  @section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Add an Addon</div>
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
                  {!! Form::model($amenity, array('class'=>"form-horizontal", 'role'=>"form",'url'=>'amenities/edit/'.$amenity->id,'method'=>'patch', 'files'=>true)) !!}
                  
                  <div class="form-group">
                    <div class="col-md-6">
                    <label>Name</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Addon Name" value="{{ $amenity->title }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6">
                    <label>Price</label>
                      <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" value="{{ $amenity->price}}">
                    </div>
                  </div>

                  <div>
                    <label>
                      Description
                    </label>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-6">
                      <textarea class="form-control" name="description" rows="5" value="{{ $amenity->description }}"></textarea>
                    </div>
                  </div>
                  <div>

                  <div class="form-group">
                    <div class="col-md-6">
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
@endsection