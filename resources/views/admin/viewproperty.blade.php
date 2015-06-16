@extends('admin')

@section('content')
  <div class='row'>
</div>
    <div class='row'><a href="{{ url('/admin/properties') }}"><button class="btn topbtn btn-primary">Return to properties</button></a></div>

  <div class="container-fluid">
    <div class="row">
     
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Add A Posting to {{ $data['property']->title}}
          </div>
            <div class="panel-body">
              <div class="control-group">
                <div class="controls">                  
                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'postings','method'=>'POST', 'files'=>true)) !!}
                   <input type="hidden" name="property_id" value="{{ $data['property']->id }}">
                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Posting Title" value="{{ old('title') }}">
                    </div>
                  </div>

                  
                  <div class="form-group">
                      <div class="col-md-6">
                        <label>Room Images</label>
                        {!! Form::file('images[]',array('multiple'=>true))!!}
                      </div>
                  </div>

                  <input type="hidden" name="property_type" value="{{ $data['property']->property_type }}">
                  @if($data['property']->property_type == 'apartment')

                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Available Units</label>
                      <input type="text" class="form-control" id="count" name="count" placeholder="Enter Number of Units" value="{{ old('count') }}">
                    </div>
                  </div>
                  @endif
                  
                  <div class="form-group">
                      <div class="col-md-6">
                        <label>Earliest Move In</label> </br>
                        {!! Form::input('date','available_date')!!}
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-6">
                        <label>Price <strong>STICK TO THE FORMAT "500", just the number</strong></label> </br>
                        {!! Form::input('number','price')!!}
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-3">
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

@foreach($data['rooms'] as $posting)
<section class="active-list">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">{!! $posting->title!!}</div>
            <div class="panel-body">
              <div class='row'>
                <div class="col-md-5">
              @if(array_key_exists($posting->id, $data))
              
                    @foreach($data[$posting->id] as $image)

                      <a class="example-image-link" href="/{{$image->location}}/{{$image->file_name}}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">    
      <button class="btn topbtn btn-primary">
        View Images
      </button>
    </a>
                      
                    


                    @endforeach
                  @endif
                </div>
                <div class="col-md-3">
                  <h4>Description</h4>
                  <p>{{$posting->available}}</p>
                </div>

                <div class="col-md-4">
                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'admin/postings/lock/'.$posting->id,'method'=>'post')) !!}
                      {!! Form::submit('Lock', array('class'=>'btn btn-alrt')) !!}              
                  {!! Form::close() !!}

                    {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'postings/destroy/'.$posting->id, 'method'=>'POST')) !!}
                      {!! Form::submit('Delete', array('class'=>'btn btn-alrt')) !!}              
                  {!! Form::close() !!}

                  {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'admin/updatePosting/'.$posting->id,'method'=>'GET')) !!}
                      <input type='hidden' value='{{$posting->id}}' name='posting_id'>
                      {!! Form::submit('Edit Posting', array('class'=>'btn btn-primary')) !!}        
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
</section>
<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.properties').addClass('active');
</script>
@endsection

