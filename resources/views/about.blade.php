@extends('app')

@section('content')
<style type="text/css">
	/* About / Loyalty Stylings */
	@media(min-width: 770px) {
	    .container{
	        padding: 80px 0 40px 0 !important;
	    }
	}

	.container{
	    padding: 20px 0 20px 0 !important;
	}

	.subtitle {
	    padding:0;
	    font-size: 24pt;
	    text-align: center;
	}

	.loyalty {
	    margin-top: 20px;
	    margin-bottom: 20px;
	}

	span.emph {
	    font-weight: bold;
	    text-decoration: underline;
	}
	.title{
	    padding: 30px 0 0 0;
	    font-size: 24pt;
	    text-align: center;
	}
	h1 {
	    padding-bottom: 20px;
	}

	h2 {
	    margin-top: 20px;
	    margin-bottom: 40px;
	    font-size: 12pt;
	    text-align: center;
	    text-decoration: underline;
	}
</style>

<div class="container slowfade">
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

	<div class="container">
		<h1 class="subtitle">
			CBH Loyalty Program
		</h1>
		<section>
			<p class="loyalty">
				At CBH, we want to give you the best experience possible as well as providing you with quality off campus living. We realize that after you’ve studied here for a year or so, you will be fully integrated into your new home and community. It is for this reason that if you resign a lease through CBH that was a minimum of 8 months long, you’re automatically entitled to <span class="emph">up to $25/month</span> off our original price.
			</p>

			<p class="loyalty">
				Even with this discount you are still eligible for all of our community discounts and of course, our personalized service. Stay with the CBH family and continue to enjoy all of our benefits.
			</p>
			<h2>Re-sign. Save money. It's that simple.</h2>
		</section>
	</div>
</div>

@endsection