@extends('app')


@section('content')
<div class="container toppad">

	<div class="row">
		
		<div class="col-md-8 col-md-offset-2">

		@if($data['requests']==null)
			<h1>Looks like you have yet to make a request!</h1>
		@else
		@foreach($data['requests'] as $request)
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingThree">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#{{$request->id}}" aria-expanded="false" aria-controls="{{$request->id}}">
		          Collapsible Group Item #3
		        </a>
		      </h4>
		    </div>
		    <div id="{{$request->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      <div class="list-group">
		      </div>
		      <ul>
		      	@if(array_key_exists($request->id.'cart', $data))
			      	@foreach($data[$request->id.'cart'] as $item)
			      	<li class="list-group-item">{{$item->quantity}}x{{$item->item_name}}</li>
			      	@endforeach
		      	@else
		      		<li class="list-group-item">You haven't selected any items for this positng! </li>
		      	@endif
		      </ul>
		    </div>
		  </div>
		@endforeach
		@endif	
			</div>
		</div>
	</div>


@endsection