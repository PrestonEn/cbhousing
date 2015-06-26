@extends('app')

@section('content')
<style type="text/css">
	@media(min-width: 770px){
		.container{
			padding-top: 80px !important;
			padding-bottom:40px !important;
		}
	}

	.container{
		padding-top: 60px;
		padding-bottom: 30px;
	}

	.title{
		font-size: 24pt;
		text-align: center;
	}

	h1{
		padding-bottom: 20px;
	}
</style>

<div class="container">
		<h1 class="title">About Cross Border Housing</h1>	
	<section class="about">
	<h1>Choose your home</h1>
	<p> 
		Our comprehensive online platform provides listings of local student properties of which a prospective international 
		or non-local student can view, compare, and pay for all before you arrive at your new home. At the same time, we go far beyond 
		connecting students with local room listings. Before rooms are listed on our website, CBH representatives vigorously screen each 
		potential house and landlord in order to verify that they meet a standard level of quality set by CBH. 
	</p>
	</section>
	<section class="about">
		<h1>Customize your stay</h1> 
		<p>
			Once you find your new place you can add any extra amenities that you might need, including pots, pans, cutlery, glassware, 
			and many others. Anything you choose will be ready and waiting in your room upon your arrival. You also have the option of 
			choosing such services such as airport pickup or maid services.
		</P>
	</section>
	<section class="about">
		<h1>360 Support</h1> 
		<p>
			In addition to providing quality room listings and any additional amenities that one may need, we provide constant community 
			support throughout your stay. Email us with any questions, comments, or concerns at any time, about anything. 
		</p>
	</section>
	<section class="about">
		<h1>CBH Community</h1> 
		<p>
			Not only do you get a quality room and are able to completely customize your stay with additional amenities, but once you book 
			through CBH you become a part of the CBH Community. As part of the CBH Community you can get special discounts at local student 
			hotspots. Retail outlets, places to eat, touring, and nightlife are just a few of the areas that CBH Community members receive 
			this courtesy. 
		</p> 
	</section>
</div>

@endsection