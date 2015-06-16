@extends('admin')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Add A Property</div>
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
                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'properties','method'=>'POST', 'files'=>true)) !!}
                 
                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Property Title" value="{{ old('title') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Landlord Email Address</label>
                      <select class="form-control" id="landlordemail" name="email" placeholder="Enter landlord email" value="{{ old('email') }}">
                          <option selected>Select landlord</option>
                          @foreach($data['l'] as $lord)
                            <option value="{{$lord->email}}">{{$lord->email}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Address</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter address (Street name, city name, postal code" value="{{ old('address') }}">
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6">
                        <label>Main Image</label>
                        {!! Form::file('images[]',array('multiple'=>true))!!}
                      </div>
                  </div>

                  <div>
                    <label>
                      Description
                    </label>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-6">
                      <textarea class="form-control" name="description" rows="5" value="{{ old('description') }}"></textarea>
                    </div>
                  </div>
                  <div>
                    <label>
                      Ameneties
                    </label>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-6">
                      <textarea class="form-control" name="amenities" rows="3" value="{{ old('amenities') }}"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-2">
                    <label>Estimated Distance to School</label>
                      <input type="text" class="form-control" id="distance" name="distance" placeholder="Eg: 3 Km" value="{{ old('distance') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">
                    <label>Estimated Time to Bus Stop</label>
                      <input type="text" class="form-control" id="time" name="time" placeholder="eg: 3 minuets to transit" value="{{ old('time') }}">
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
<section class="active-list">
@foreach($data['p'] as $property)
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">{!! $property->title!!}</div>
            <div class="panel-body">
              <div class='row'>
                <div class="col-md-3">
                  <img src="/{{$property->thumbnail}}"></img>
                </div>
                <div class="col-md-3">
                  <h4>Description</h4>
                  <p>{{$property->description}}</p>
                </div>
                <div class="col-md-3">
                  <h4>Amenities</h4>
                  <p>{{$property->amenities}}</p>
                </div>
                <div class="col-md-3">
                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'properties/destroy/'.$property->id,'method'=>'POST')) !!}
                      {!! Form::submit('Delete', array('class'=>'btn btn-alrt')) !!}              
                  {!! Form::close() !!}

                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'admin/properties/'.$property->id,'method'=>'GET')) !!}
                      {!! Form::submit('Add/View Rooms', array('class'=>'btn btn-primary')) !!}        
                  {!! Form::close() !!}

                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'admin/updateProperty/'.$property->id,'method'=>'GET')) !!}
                      {!! Form::submit('Edit Property', array('class'=>'btn btn-primary')) !!}        
                  {!! Form::close() !!}
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endforeach
</section>
<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.properties').addClass('active');
</script>
@endsection