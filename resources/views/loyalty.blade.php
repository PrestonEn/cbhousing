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

	.loyalty {
		margin-top: 20px;
		margin-bottom: 20px;
		margin-right: 10%;
		margin-left: 10%;
	}

	span.emph {
		font-weight: bold;
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

<div class="container">
	<h1 class="title">
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

@endsection