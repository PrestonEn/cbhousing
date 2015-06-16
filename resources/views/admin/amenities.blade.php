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
                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'amenities','method'=>'POST', 'files'=>true)) !!}
                  
                  <div class="form-group">
                    <div class="col-md-6">
                    <label>Name</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Addon Name" value="{{ old('title') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                    <label>Product Number</label>
                      <input type="text" class="form-control" id="product_number" name="product_number" placeholder="Enter PID" value="{{ old('product_number') }}">
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-md-6">
                    <label>Price</label>
                      <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" value="{{ old('price') }}">
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6">
                        <label>Main Image</label>
                        <input type="file" id="image" name="image">
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
  @foreach($addons as $amenity)
    <section class="active-list">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">{!! $amenity->title!!}</div>
            <div class="panel-body">
<div class='row'>
                <div class="col-md-3">
                  <img src="/{{$amenity->thumbnail}}"></img>
                </div>
                <div class="col-md-3">
                  <h4>Description</h4>
                  <p>{{$amenity->desc}}</p>
                </div>
                <div class="col-md-3">
                  <h4>Price</h4>
                  <p>{{$amenity->price}}</p>
                </div>
                <div class="col-md-3">
                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'amenities/destroy'.$amenity->id,'method'=>'GET')) !!}
                      {!! Form::submit('Delete', array('class'=>'btn btn-alrt')) !!}              
                  {!! Form::close() !!}
                </br>
                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'admin/updateAmenity/'.$amenity->id,'method'=>'GET')) !!}
                      {!! Form::submit('Edit', array('class'=>'btn btn-primary')) !!}        
                  {!! Form::close() !!}
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  @endforeach
<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.amenities').addClass('active');
</script>
@endsection