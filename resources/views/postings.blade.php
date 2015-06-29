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
        @foreach($data['pages'] as $property)
            @if($property->rooms>0)
                <?php if($flag){
                    $class = "even";
                }else{
                    $class = "odd";
                } ?>
                    <div class="col-md-4 col-sm-6 property-item">
                        <h5 class="pricecell">{{$data[$property->id]}} room(s)</h5>
                        
                        @if($flag)
                            <div class="inner bluebox">
                        @else
                            <div class="inner orangebox">
                        @endif
                        <!-- "#portfolioModal6" -->
                        <a href="{{ url('properties/'.$property->id) }}" class="portfolio-link" data-toggle="modal">
                            <img src="/{{$property->thumbnail}}" class="img-responsive port-img">
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
</section>

<div class="row paginator-links">
    <div class="paginator-links">
        {!! $data['pages']->render() !!}
    </div>
</div>

@endsection