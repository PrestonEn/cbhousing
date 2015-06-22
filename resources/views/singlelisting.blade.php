@extends('app')

@section('content')

<div class='row property-info '>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  
		<div class="image-row">
			<div class="image-set">

  
    
    @foreach($data['property_images'] as $image)
		<a class="example-image-link" href="/{{$image->location}}/{{$image->file_name}}" data-lightbox="example-set">    
	@endforeach
		<img src="/{{$data['property']->image}}"  class="propertypic" >
    	</a> 
			</div>
		</div>
	


	<div class="col-md-12 override">
		<div class="descarea col-md-12">
			<div class="panel oPanel">
			  <div class="panel-heading">
			  	<div class="panel-title">Description</div>
			  </div>
			  <div class="panel-body bPanel">
			    {{$data['property']->description}}
			  </div>
			</div>
		</div>

		<div class="descarea col-md-12">
			<div class="panel oPanel">
			  <div class="panel-heading ">
			  	<div class="panel-title">Amenities</div>
			  </div>
			  <div class="panel-body bPanel">
			    <p>{{$data['property']->amenities}}</p>
			  </div>
			</div>
		</div>
	</div>
</div>	
<div class="col-md-8 col-sm-8">
<div class="titlearea col-md-8 ">
				<h3 id="title">{{$data['property']->title}}</h3>
				<p>{{$data['property']->address}}</p>

			<div class="col-md-12 infobar">
				<div class="col-md-4 metric ">
					<div class="desc-fix"><h4>Distance To School</h4></div>
					<img  class="cntr" src="http://crossborderhousing.com/img/street.png">
					<h4>{{$data['property']->distance}}</h4>
				</div>
				<div class="col-md-4 metric">
					<div class="desc-fix"><h4>Total Available Rooms</h4></div>
					<img src="http://crossborderhousing.com/img/house.png">
					<h4>{{$data['property']->rooms}}</h4>

				</div>
				<div class="col-md-4 metric">
					<div class="desc-fix"><h4>Minutes Walk to Transit</h4></div>
					<img src="http://crossborderhousing.com/img/bus.png">
					<h4>{{$data['property']->time_to_bus}}</h4>
				</div>
			</div>
		</div>

		@foreach($data['rooms'] as $room)
		<div class='col-md-4  col-sm-6'>
		
			<div class="image-row">

					<h5 class="pricecell">${{$room->price}}/m</h5>

				<div class="image-set">
	    @foreach($data[$room->id] as $image)
			<a class="example-image-link" href="/{{$image->location}}/{{$image->file_name}}" data-lightbox="example-set"> 
		@endforeach
			<img src="/{{$data[$room->id][0]->location}}/th_{{$data[$room->id][0]->file_name}}" class="postpic" >
	    	</a> 
			</div>
			<div class='capti'>
				<h5 class="fR">
				@if($room->locked)
					This Room Is Currently On Hold, But May Become Available Soon
				@else	
				 Availability:{{$room->available}}
				 <h4 class="roomtitle">{{$room->title}}</h4>
				@endif
				</h5>
								@if(Auth::user() && !$room->locked )
				{!! Form::open(array('class'=>"form-horizontal", 'role'=>"form",'url'=>'request/'.$room->id,'method'=>'get')) !!}
					{!! Form::hidden('posting_id',$room->id) !!}
					{!! Form::hidden('property_title',$data['property']->title) !!}
					{!! Form::hidden('address',$data['property']->address) !!}
					
	        		{!!Form::submit('Request!', array('class'=>'reqbutton btn'))!!}
	            {!! Form::close() !!}
	            			@endif
				

			</div>
			</div>
		</div>
		@endforeach
	
</div>
	

	


@endsection



@section('modals')
@if(Auth::guest())
<script type="text/javascript">
	

    jQuery.noConflict();
    	
        $(document).ready(function() {
            $('#popupmodal').modal('show');
        });
    </script>

<div class="modal fade" id="popupmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Your home is just a few clicks away!</h4>
      </div>
      <div class="modal-body">
        <p>Sign up now to access our home request service and move in packages.</p>
      </div>
      <div class="modal-footer">

      <a href="{{url('auth/register')}}">	
      	<button type="button" class="btn btn-default">Sign Up!</button>
      </a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
