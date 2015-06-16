@extends('app')

@section('content')

<section class="postingbar">
    <h2 id="ourpst">Our Postings</h2>
</section>

<section class="posting-top">
    <h1>Take a look at these!</h1>
</section>

	<section id="portfolio">
	    <div class="container">
            <div class="row">
<?php $flag = true; ?>
@foreach($pages as $property)
@if($property->rooms>0)
<?php if($flag){
    $class = "even";
}else{
    $class = "odd";
} ?>
                <div class="col-md-4 col-sm-6 property-item">
                    @if($flag)
                        <div class="inner bluebox">
                    @else
                        <div class="inner orangebox">
                    @endif
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <img src="/{{$property->thumbnail}}" class="img-responsive port-img" alt="">
                    </a>

                    <div class="portfolio-caption">
                        <a href="{{url('properties/'.$property->id)}}">
                           <h4 class='title'>{{$property->title}}</h4>
                           <h4>{{$property->address}}</h4>
                        </a>
                    </div>
                </div>
                </div>
<?php $flag = !$flag ?>
@endif
@endforeach
            </div>
        </div>
    </section>

<div class="row paginator-links">
    <div class="paginator-links">
        {!! $pages->render() !!}
    </div>
</div>

@endsection