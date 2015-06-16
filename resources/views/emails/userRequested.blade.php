<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Request for {{$outdata['title']}}  Has Been made by {{$outdata['user']->email}}</h2>
		<h3>Security deposit will be ${{$outdata['booking']->rent*2}}</h3>
		<div>

			@if(!is_null($outdata['addons']))
			User Request The Following Items
				<ul>


				@foreach($outdata['addons'] as $addon)

					<li>{{$addon['quant']}} {{$addon['title']}}: ${{$addon['quant']*$addon['price']}}</li>
				@endforeach
			</ul>
			@endif
		</div>
		<h2>Total is:{{$outdata['total']}}</h2>
	</br>
		
	</body>
</html>