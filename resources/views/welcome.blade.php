@extends('app')

@section('content')
<header>
    <div class="container" >
        <div class="splash-text">
            <div class="splash-head">Welcome Home</div>
            <div class="splash-sub">Experience off-campus living the right way.</div>
            <a href="{{ url('/about') }}" class="page-scroll btn btn-xl">Tell Me More</a>
        </div>
    </div>
</header>
    <!-- end header -->

    <!-- button bar -->
<row >
    <div class="btn-group-lg text-center" id="buttnbar" role="group" aria-label="...">
        <a href="{{url('/properties')}}">
            <button type="button" class="btn btn-lg" id="schoolbtn">
            <i class="fa fa-graduation-cap fa-lg"></i>
                    <span class="btntxt" vertical-align: "middle;">View Postings</span>
            </button>
        </a>
    </div>
</row>
    <!-- end button bar -->


<!-- entry section -->
<section class="main-cont">

    <div class="section-heading">
        <div class="section-head">Find the house that's right for you.</div>
        <div class="section-sub">Choose from our approved and certified online listings.</div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <img src="img/home-images/Quality-resize.jpg" class="img-responsive" alt="">
                    </a>

                </div>
                <div class="col-md-6 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <img src="img/home-images/listings.jpg" class="img-responsive" alt="">
                    </a>

                </div>
            </div>
        </div>

        <a href="#services-button" class="page-scroll btn btn-xl" id="viewAll">View All Listings</a>
    <!-- image grid -->
</section>

<section>

    <div class="section-heading">
        <div class="section-head">Organize everything you need to get started.</div>
        <div class="section-sub">Transportation, mobile phone, food packages, bedding and more.</div>
    </div>

        <!-- carosel implementation -->
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
     <div class="item active ad1">
        <div class="carousel-caption">
           <h4>Airport Pickup Services</h4>
           <p>We can help make your transition from airport to home as easy as possible.</p>
        </div>
     </div>
     <div class="item ad2">
        <div class="carousel-caption">
            <h4>Make you house home, before you arrive</h4>
            <p>Choose a package of quality essential items to be delivered before you arrive. Come home to fresh sheets, utensils and all the cookware and dishes you need!</p>
         </div>
     </div>
     <div class="item ad3">
        <div class="carousel-caption">
           <h4>Ongoing support</h4>
           <p>Cross Border Housing is there for you every step of the way, from the time you sign up to the time you depart. Reach us by email, text or phone call, whenever you need us!</p>
        </div>
    </div>
  </div>
  <!-- Carousel nav -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div>
</section>

<!-- easy transactions -->
<section>

    <div class="section-heading">
        <div class="section-head">Secure transactions made easy.</div>
        <div class="section-sub">Pay online to secure your home, and pay in person during your stay.</div>
    </div>
    <div class="paypal">
    <!-- PayPal Logo --><a href="https://www.paypal.com/ca/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/ca/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/en_CA/mktg/logo-image/pp_cc_mark_111x69.jpg" border="0" alt="PayPal Logo"></a><!-- PayPal Logo -->
    </div>
</section>
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
          <div class="section-heading color-overide">
              <div class="section-head color-white">Welcome to the Family.</div>
              <div class="section-sub color-white">The Cross Border Housing Community is here for you every step of the way.</div>
          </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm"  action="contactus" method="post">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" name="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <textarea rows="5" class="form-control" name="message" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Scripts -->
</body>
@endsection
