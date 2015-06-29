@extends('app')

@section('content')
    
<div class="container-fluid">
<div class="row" style="padding-top:50px;">
	<div class="col-md-4 col-md-offset-4 col-sm-8" role="main">

		<div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Booking Request Summary</div>
			  <div class="panel-body">
			    <p>We ask to collect first and last months rent on behalf of the landlords as as security deposit</p>
			  </div>

			  <!-- List group -->
			  <ul class="list-group">
			    <li class="list-group-item"><h2 class="floatLeft">Request to book:</h2><h2 class="floatRight">{{$data['posting']->title}}</h2></li>
			    <li class="list-group-item"><h2 class="floatLeft">Address:</h2><h2 class="floatRight"> {{$data['property']->address}}</h2></li>
			    <li class="list-group-item"><h2 class="floatLeft">Monthly Rent:</h2><h2 class="floatRight">  ${{$data['posting']->price}} CAD</h2></li>
			    <li class="list-group-item"><h2 class="floatLeft">First and Last Months Rent:</h2><h2 class="floatRight">  ${{$data['posting']->price * 2}} CAD</h2></li>
			  </ul>
		</div>
	</div>
</div>


    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">Choose Starting Package Items and Select Requested Rent Period</div>
            <div class="panel-body">
            	<p>We'll have everything ready, in your house, by the time you arrive.</p>
            </div>
             <div class="panel-body"> 
              <div class="control-group">
                <div class="controls">                  
             
             {!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'request/book','method'=>'POST', 'files'=>true)) !!}
                @foreach($data['addons'] as $addon)
                  <div class="form-group">
                    <div class="col-md-12">

                    <img src="/{{$addon->thumbnail}}" style="display:inline-block; float: left; height:180px; padding-right:30px;">
                    <label>{{$addon->title}}</label>
                    <h2>${{$addon->price}}</h2>
                      <input type="hidden" name="{{$addon->id}}" value="{{$addon->id}}">
                      <input type="number" class="form-control" id="title" style="width:100px" name="{{$addon->id}}_count" placeholder="Quantity" value="0">
                    </div>
                  </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
          <div class="panel-heading">Request Your Move In/Move Out Dates </div>
             <div class="panel-body"> 
              <div class="control-group">
                <div class="controls">                  
                  <div class="form-group" style="padding-top:10px;">
                    <div class="col-md-12">
                    <label for="exampleInputEmail1">Move In Date</label>
                      <input type="date" class="form-control" id="title"  name="move_in_date" value="{{$data['posting']->available}}" min="{{$data['posting']->available}}">
                    </div>
                  </div>
                  
                  <div class="form-group" style="margin-top:10px;">
                    <div class="col-md-12">
                    <label for="exampleInputEmail1" style="padding-top:10px;">Move Out Date</label>
                      <input type="date" class="form-control" id="title"  name="move_out_date"style="margin-bottom:10px;">
                    </div>
                       <input type="hidden" name="posting_id" value="{{$data['posting']->id}}">
                      {!! Form::submit('Request To Book', array('class'=>'btn btn-primary')) !!}
         
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
