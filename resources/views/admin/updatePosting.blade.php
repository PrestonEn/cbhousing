@extends('admin')

@section('content')
  <div class='row'>
</div>
    <div class='row'><a href="{{ url('/admin/properties') }}"><button class="btn topbtn btn-primary">Return to properties</button></a></div>

  <div class="container-fluid">
    <div class="row">
     
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Update Posting 
          </div>
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
                  {!! Form::model($data['p'], array('class'=>"form-horizontal", 'role'=>"form",'url'=>'postings/edit/'.$data['p']->id,'method'=>'PATCH', 'files'=>true)) !!}
                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Posting Title" value="{{ $data['p']->title }}">
                    </div>
                  </div>

                                    <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Price</label>
                      <input type="number" class="form-control" id="title" name="price" placeholder="Enter Posting price" value="{{$data['p']->price}}">
                    </div>
                  </div>


                  
{{--                   <div class="form-group">
                      <div class="col-md-6">
                        <label>Room Images</label>
                        {!! Form::file('images[]',array('multiple'=>true))!!}
                      </div>
                  </div> --}}

                  @if($data['p']->posting_type == 'apartment')
                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Available Units</label>
                      <input type="number" class="form-control" id="count" name="count" placeholder="Enter Number of Units" value="">
                    </div>
                  </div>
                  @endif
                  
                  <div class="form-group">
                      <div class="col-md-6">
                        <label>Earliest Move In</label> </br>
                        {!! Form::input('date','available')!!}
                      </div>
                  </div>
                  <input type="hidden" name="posting_id" value="{{ $data['p']->id }}">

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

    <div class='row'>
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Add images to {{ $data['p']->title}}
          </div>
            <div class="panel-body">
              <div class="control-group">
                <div class="controls"> 
              {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'admin/addPostingImg/'.$data['p']->id,'method'=>'POST', 'files'=>true)) !!}
                    <input type="hidden" name="posting_id" value="{{ $data['p']->id }}">

                    <div class="form-group">
                      <div class="col-md-6">
                        <label>New Images</label>
                        {!! Form::file('images[]',array('multiple'=>true))!!}
                      </div>
                  </div>
                {!! Form::submit('Add Posting Images', array('class'=>'btn btn-primary')) !!}        
              {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</section>
<script type="text/javascript">
    $('li.home').removeClass('active');
    $('li.properties').addClass('active');
</script>
@endsection

