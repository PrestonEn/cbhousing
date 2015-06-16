<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Your Request for {{$data['posting']->title}}  Has Been Approved!</h2>
		<h3>Your security deposit will be ${{$data['posting']->price*2}}</h3>
		<div>

			@if(array_key_exists('amenities'),$data)
			Included in your bill will be the following amenities
				<ul>
				@foreach($data['amenities'] as $addon)
					<li>{{$addon->quantitiy}} {{$addon->title}}: ${{$addon->quantitiy*$addon->price}}</li>
				@endforeach
			</ul>
			@endif
		</div>
		<h2>Your Total is:{{$data['total']}}</h2>
	</br>
		<div><strong>Please Note:</strong>
		 You will recieve a secure paypal invoice equal to the total listed in this email. You will have a period of 4 days to transfer the required payment. After this 4 day period expires, your request will de destroyed to allow other users access to the posting. In the event of multiple active postings, upon recieving payment, all other requests will be removed.</div>
		 <div>If you have any questions, please do not hesitate to contact us at requests@crossborderhousing.com</div>
		 <div>Thank you</div>
	</body>
</html>