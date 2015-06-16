@extends('admin')

@section('content')
 <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Edit Property</div>
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
                  {!! Form::model($data['p'], array('class'=>"form-horizontal", 'role'=>"form",'url'=>'properties/edit/'.$data['p']->id,'method'=>'PATCH', 'files'=>true)) !!}
                 
                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Title</label>
                    	{!! Form::text('title') !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Landlord Email Address</label>
                      <select class="form-control" id="landlordemail" name="email" placeholder="Enter landlord email" value="{{ old('email') }}">
                          <option selected>Select Landlord</option>
                          @foreach($data['l'] as $lord)
                            <option value="{{$lord->email}}">{{$lord->email}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Address</label>
                      {!! Form::text('address') !!}
                    </div>
                  </div>

                  <div>
                    <label>
                      Description
                    </label>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-6">
                    	{!! Form::textarea('description') !!}
                    </div>
                  </div>
                  <div>
                    <label>
                      Ameneties
                    </label>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-6">
                     	{!! Form::textarea('amenities') !!}

                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-2">
                    <label>Estimated Distance to School</label>
                    	{!!Form::text('distance')!!}
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-2">
                    <label>Estimated Time to Bus Stop</label>
                        {!! Form::file('main_img')!!}
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                    <label>Estimated Time to Bus Stop</label>
                      	{!!Form::text('time_to_bus')!!}
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                    <h4>Property Type</h4>
                    <label>Apartments:</label>
                      {!!Form::radio('property_type', 'apartment')!!}
                      <br></br>
                    <label>House:</label>

                      {!!Form::radio('property_type', 'house')!!}

                    </div>
                  </div>


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
  <div class="image-row">
  <div class="image-set">

    <div class='row'>
    
    @foreach($data['images'] as $image)
<a class="example-image-link" href="/{{$image->location}}/{{$image->file_name}}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">    @endforeach
      <button class="btn topbtn btn-primary">
        View Images
      </button>
    </a>
    </div>
  </div>
</div>
    <div class='row'>
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Add A Posting to {{ $data['p']->title}}
          </div>
            <div class="panel-body">
              <div class="control-group">
                <div class="controls"> 
              {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'admin/addPropertyImg/'.$data['p']->id,'method'=>'POST', 'files'=>true)) !!}
                    <input type="hidden" name="property_id" value="{{ $data['p']->id }}">

                    <div class="form-group">
                      <div class="col-md-6">
                        <label>New Images</label>
                        {!! Form::file('images[]',array('multiple'=>true))!!}
                      </div>
                  </div>
                {!! Form::submit('Add Property Images', array('class'=>'btn btn-primary')) !!}        
              {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection