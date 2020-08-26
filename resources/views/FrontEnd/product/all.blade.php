@extends('FrontEnd.layouts.master')
@section('content')
<div class="page-title" style="background-image: url(FrontEnd/images/page-title.png)">
    <h1>Portfolio</h1>
</div>

<section id="portfolio">
    <div class="container">
        <div class="center">
            <h2>Recent work</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>


        <ul class="portfolio-filter text-center">
            <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Creative</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".html">Photography</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".wordpress">Web Development</a></li>
        </ul>
        <!--/#portfolio-filter-->

        <div class="row">
            <div class="portfolio-items">
                @foreach($products as $product)
                <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3 single-work">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="{{ $product->image }}" alt="{{ $product->name }}" style="height:290px">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <a class="preview" href="{{ $product->image }}" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--/.portfolio-item-->


            </div>
        </div>
        {!! $products->render() !!}
    </div>
</section>
@endsection
