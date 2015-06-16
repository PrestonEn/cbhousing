<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Your Request for {{$outdata['title']}}  Has Been Sent and Is Being Confirmed By Our Team</h2>
		<h3>Your security deposit will be ${{$outdata['booking']->rent*2}}</h3>
		<div>

			@if(!is_null($outdata['addons']))
			
			Included in your bill will be the following amenities
				<ul>


				@foreach($outdata['addons'] as $addon)

					<li>{{$addon['quant']}} {{$addon['title']}}: ${{$addon['quant']*$addon['price']}}</li>
				@endforeach
			</ul>
			@endif
		</div>
		<h2>Your Total is:{{$outdata['total']}}</h2>
	</br>
		<div><strong>Please Note:</strong>
		 If your request is approved, you will recieve an email informing you of the approval, followed shortly by a secure paypal invoice equal to the total listed in this email. Once the request has been approved, you will have a period of 4 days to transfer the required payment. After this 4 day period expires, your request will de destroyed to allow other users access to the posting. In the event of multiple active postings, upon recieving payment, all other requests will be removed.</div>
		 <div>If you have any questions, please do not hesitate to contact us at requests@crossborderhousing.com</div>
		 <div>Thank you</div>
	</body>
</html>