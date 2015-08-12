@extends('app')

@section('content')

<section class="postingbar slowfade">
    <h2 id="ourpst">Our Postings</h2>
</section>

<section class="posting-top slowfade">
    <h1>Take a look at these!</h1>
</section>

<section id="portfolio">
    <div class="container">
        <div class="row">
        
        <?php 
            $flag = true; 
            $itemctr = 0;
        ?>
        @foreach($data['pages'] as $property)
            @if($property->rooms>0)
                <?php if($flag){
                    $class = "even";
                }else{
                    $class = "odd";
                } ?>
                @if($itemctr > 2)
                    <div class="col-md-4 col-sm-6 property-item hideme">
                @else
                    <div class="col-md-4 col-sm-6 property-item slowfade">
                @endif
                        @if($flag)
                            <h5 class="roomcell blue">{{$data[$property->id]}} room(s)</h5>
                            <div class="inner bluebox">
                        @else
                            <h5 class="roomcell orange">{{$data[$property->id]}} room(s)</h5>
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
                <?php 
                    $flag = !$flag;
                    $itemctr++;
                ?>
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