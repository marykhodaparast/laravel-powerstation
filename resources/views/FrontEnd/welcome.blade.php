@extends('FrontEnd.layouts.master')
@section('styles')
  <title>main page</title>
  <meta name="description" content="">
@endsection
@section('content')
<section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $slider)
                @if($loop->index==0)
                <div class="item active" style="background-image:url({{$slider->image}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="carousel-content">
                                <h1 class="animation animated-item-1">{{$slider->title}}</h1>
                                    <div class="animation animated-item-2">
                                        {{$slider->body}}
                                    </div>
                                    @if($slider->link)
                                <a class="btn-slide animation animated-item-3" href="{{$slider->link}}">Learn More</a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @else
                <div class="item" style="background-image:url({{$slider->image}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="carousel-content">
                                <h1 class="animation animated-item-1">{{$slider->title}}</h1>
                                    <div class="animation animated-item-2">
                                        {{ $slider->body}}
                                    </div>
                                    @if($slider->link)
                                <a class="btn-slide animation animated-item-3" href="{{$slider->link}}">Learn More</a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif


                @endforeach

                <!--/.item-->
            </div>
            <!--/.carousel-inner-->
        </div>
        <!--/.carousel-->
        <a class="prev hidden-xs hidden-sm" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs hidden-sm" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section>
    <!--/#main-slider-->
    <section id="products">
            <div class="container">
                    <div class="center fadeInDown">
                        <h2>Our Products</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>

                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-sm-6 col-md-4">
                            <div class="media services-wrap fadeInDown">
                                <div class="card" style="width: 100%;">
                                    <img src="{{ $product->image }}" class="card-img-top center-image" alt="{{ $product->name }}" height="200" width="300">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $product->name }}</h5>
                                      <p class="card-text">{{ Str::words($product->description,10) }}</p>
                                      <a href="{{ route('products.show',['slug'=>$product->slug]) }}" class="btn btn-primary">More...</a>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <!--/.row-->
                    <div class="clearfix text-center">
                            <br>
                            <br>
                            <a href="{{ route('products.all') }}" class="btn btn-primary">Show More</a>
                        </div>
                </div>
    </section>

    <section id="recent-works">
        <div class="container">
            <div class="center fadeInDown">
                <h2>Recent Works</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 single-work">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="FrontEnd/images/portfolio/item-1.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <a class="preview" href="FrontEnd/images/portfolio/item-1.png" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 single-work">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="FrontEnd/images/portfolio/item-2.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <a class="preview" href="FrontEnd/images/portfolio/item-2.png" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 single-work">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="FrontEnd/images/portfolio/item-3.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <a class="preview" href="FrontEnd/images/portfolio/item-3.png" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 single-work">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="FrontEnd/images/portfolio/item-4.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <a class="preview" href="FrontEnd/images/portfolio/item-4.png" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 single-work">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="FrontEnd/images/portfolio/item-5.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <a class="preview" href="FrontEnd/images/portfolio/item-5.png" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 single-work">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="FrontEnd/images/portfolio/item-6.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <a class="preview" href="FrontEnd/images/portfolio/item-6.png" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->
            <div class="clearfix text-center">
                <br>
                <br>
                <a href="#" class="btn btn-primary">Show More</a>
            </div>
        </div>
        <!--/.container-->

    </section>
    <!--/#recent-works-->


    {{-- Start:section news --}}
    <section id="services" class="service-item">
        <div class="container">
            <div class="center fadeInDown">
                <h2>News</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">

                @foreach($news as $new)
                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap fadeInDown">
                        <div class="card" style="width: 100%;">
                            <img src="{{ $new->image }}" class="card-img-top center-image" alt="{{ $new->title }}" height="200" width="300">
                            <div class="card-body">
                              <h5 class="card-title">{{ $new->title }}</h5>
                              <p class="card-text">{{ Str::words($new->description,10) }}</p>
                              <a href="{{ route('news.show',['slug'=>$new->slug]) }}" class="btn btn-primary">More...</a>
                            </div>
                          </div>
                    </div>
                </div>
               @endforeach

            </div>
            <div class="clearfix text-center">
                <br>
                <br>
                <a href="{{ route('news.all') }}" class="btn btn-primary">Show More</a>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    {{-- End:section news --}}
    {{--  <section id="middle" class="skill-area" style="background-image: url(FrontEnd/images/skill-bg.png)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 fadeInDown">
                    <div class="skill">
                        <h2>Our Skills</h2>
                        <p>All users on MySpace will know that there are millions of people out there. Every <br> day besides so many people joining this community.</p>
                    </div>
                </div>
                <!--/.col-sm-6-->

                <div class="col-sm-6">
                    <div class="progress-wrap">
                        <h3>Graphic Design</h3>
                        <div class="progress">
                            <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                <span class="bar-width">85%</span>
                            </div>

                        </div>
                    </div>

                    <div class="progress-wrap">
                        <h3>HTML</h3>
                        <div class="progress">
                            <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                <span class="bar-width">95%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="progress-wrap">
                        <h3>CSS</h3>
                        <div class="progress">
                            <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                <span class="bar-width">80%</span>
                            </div>
                        </div>
                    </div>

                    <div class="progress-wrap">
                        <h3>Wordpress</h3>
                        <div class="progress">
                            <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                <span class="bar-width">90%</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>  --}}
    <!--/#middle-->

    {{--  <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 fadeInDown">
                    <div class="tab-wrap">
                        <div class="media">
                            <div class="parrent pull-left">
                                <ul class="nav nav-tabs nav-stacked">
                                    <li class=""><a href="#tab1" data-toggle="tab" class="analistic-01">Responsive Web Design</a></li>
                                    <li class="active"><a href="#tab2" data-toggle="tab" class="analistic-02">Premium Plugin Included</a></li>
                                    <li class=""><a href="#tab3" data-toggle="tab" class="tehnical">Predefine Layout</a></li>
                                    <li class=""><a href="#tab4" data-toggle="tab" class="tehnical">Our Philosopy</a></li>
                                    <li class=""><a href="#tab5" data-toggle="tab" class="tehnical">What We Do?</a></li>
                                </ul>
                            </div>

                            <div class="parrent media-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="tab1">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="img-responsive" src="FrontEnd/images/tab2.png">
                                            </div>
                                            <div class="media-body">
                                                <h2>Adipisicing elit</h2>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade active in text-right" id="tab2">
                                        <div class="video-box">
                                            <img src="FrontEnd/images/tab-video-bg.png" alt="video">
                                            <a class="video-icon" href="http://www.youtube.com/watch?v=cH6kxtzovew" rel="prettyPhoto"><i class="fa fa-play"></i></a>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab3">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                                    </div>

                                    <div class="tab-pane fade" id="tab4">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words</p>
                                    </div>

                                    <div class="tab-pane fade" id="tab5">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures,</p>
                                    </div>
                                </div>
                                <!--/.tab-content-->
                            </div>
                            <!--/.media-body-->
                        </div>
                        <!--/.media-->
                    </div>
                    <!--/.tab-wrap-->
                </div>
                <!--/.col-sm-6-->

            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>  --}}
    <!--/#content-->

    <section id="testimonial">
        <div class="container">
            <div class="center fadeInDown">
                <h2>Testimonials</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>
            <div class="testimonial-slider owl-carousel">
                <div class="single-slide">
                    <div class="slide-img">
                        <img src="FrontEnd/images/client1.jpg" alt="">
                    </div>
                    <div class="content">
                        <img src="FrontEnd/images/review.png" alt="">
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                        <h4>- Charlotte Daniels</h4>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="slide-img">
                        <img src="FrontEnd/images/client2.jpg" alt="">
                    </div>
                    <div class="content">
                        <img src="FrontEnd/images/review.png" alt="">
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                        <h4>- Charlotte Daniels</h4>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="slide-img">
                        <img src="FrontEnd/images/client3.jpg" alt="">
                    </div>
                    <div class="content">
                        <img src="FrontEnd/images/review.png" alt="">
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                        <h4>- Charlotte Daniels</h4>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="slide-img">
                        <img src="FrontEnd/images/client2.jpg" alt="">
                    </div>
                    <div class="content">
                        <img src="FrontEnd/images/review.png" alt="">
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                        <h4>- Charlotte Daniels</h4>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="slide-img">
                        <img src="FrontEnd/images/client1.jpg" alt="">
                    </div>
                    <div class="content">
                        <img src="FrontEnd/images/review.png" alt="">
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                        <h4>- Charlotte Daniels</h4>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="slide-img">
                        <img src="FrontEnd/images/client3.jpg" alt="">
                    </div>
                    <div class="content">
                        <img src="FrontEnd/images/review.png" alt="">
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                        <h4>- Charlotte Daniels</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="partner">
        <div class="container">
            <div class="center fadeInDown">
                <h2>Our Partners</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="partners">
                <ul>
                    <li>
                        <a href="#"><img class="img-responsive fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="FrontEnd/images/partners/brand-1.png"></a>
                    </li>
                    <li>
                        <a href="#"><img class="img-responsive fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="FrontEnd/images/partners/brand-2.png"></a>
                    </li>
                    <li>
                        <a href="#"><img class="img-responsive fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="FrontEnd/images/partners/brand-3.png"></a>
                    </li>
                    <li>
                        <a href="#"><img class="img-responsive fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="FrontEnd/images/partners/brand-4.png"></a>
                    </li>
                    <li>
                        <a href="#"><img class="img-responsive fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="FrontEnd/images/partners/brand-5.png"></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--/.container-->
    </section> --}}
    <!--/#partner-->
@endsection
