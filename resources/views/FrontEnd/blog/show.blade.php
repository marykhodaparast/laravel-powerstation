@extends('FrontEnd.layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('FrontEnd/css/modal-video.min.css') }}">
@endsection
@section('content')
<div class="page-title" style="background-image: url({{ asset('FrontEnd/images/page-title.png') }})">
    <h1>Single news</h1>
</div>

<section id="blog">

    <div class="blog container">
        <div class="row">
            <div class="col-md-8">

                <div class="blog-item">
                    @if($news->video)
                    <div class='video-outter' style=" position: relative;/* left: 50%; */">
                        <img class="img-responsive img-blog" src="{{ $news->image }}" width="100%"
                            alt="{{ $news->title }}" />
                        <div class='video-inner' style=" position: absolute;left: 50%;bottom: 50%;">
                            <a class="js-modal-btn" data-channel="video" data-video-url={{ $news->video }} href="#">
                                <i class="fa fa-play" style="font-size:42px;color:red;"></i>
                            </a>
                        </div>
                    </div>
                    @else
                    <img class="img-responsive img-blog" src="{{ $news->image }}" width="100%"
                        alt="{{ $news->name }}" />
                    @endif
                    <div class="blog-content">
                            <a href="#" class="blog_cat">UI/UX DESIGN</a>
                            <h2><a href="blog-item.html">{{ $news->title }}</a></h2>

                            <div class="post-meta">

                                <p>By <a href="#">Martin Garrix</a></p>

                                {{--  <p><i class="fa fa-clock-o"></i> <a href="#">18 May 2017</a></p>  --}}

                                <p><i class="fa fa-clock-o"></i> <a href="#">{{ $publish }}</a></p>

                                <p><i class="fa fa-comment"></i> <a href="#">32</a></p>

                                <p>

                                    share:

                                    <a href="#" class="fa fa-facebook"></a>

                                    <a href="#" class="fa fa-twitter"></a>

                                    <a href="#" class="fa fa-linkedin"></a>

                                    <a href="#" class="fa fa-pinterest"></a>

                                </p>

                            </div>
                        {!! $news->body !!}

                        <div class="comments">
                            <h2>Comments</h2>
                            <div class="single-comment">
                                <div class="comment-img">
                                    <img src="{{ asset('FrontEnd/images/graverter.jpg') }}" alt="author">
                                </div>
                                <div class="comment-content">
                                    <h5>Vincent Abbott</h5>
                                    <p>All users on MySpace will know that there are millions of people out there. Every
                                        day besides so many people joining this community, there are many others who
                                        will be looking out for friends.</p>
                                </div>
                                <div class="comment-count">
                                    <a href="#"><i class="fa fa-reply"></i> Reply (1)</a>
                                    <a href="#"><i class="fa fa-heart"></i> 15</a>
                                </div>
                            </div>
                            <div class="single-comment reply">
                                <div class="comment-img">
                                    <img src="{{ asset('FrontEnd/images/graverter.jpg') }}" alt="author">
                                </div>
                                <div class="comment-content">
                                    <h5>Vincent Abbott</h5>
                                    <p>All users on MySpace will know that there are millions of people out there. Every
                                        day besides so many people joining this community, there are many others who
                                        will be looking out for friends.</p>
                                </div>
                                <div class="comment-count">
                                    <a href="#"><i class="fa fa-reply"></i> Reply (1)</a>
                                    <a href="#"><i class="fa fa-heart"></i> 15</a>
                                </div>
                            </div>
                            <div class="single-comment">
                                <div class="comment-img">
                                    <img src="{{ asset('FrontEnd/images/graverter.jpg') }}" alt="author">
                                </div>
                                <div class="comment-content">
                                    <h5>Vincent Abbott</h5>
                                    <p>All users on MySpace will know that there are millions of people out there. Every
                                        day besides so many people joining this community, there are many others who
                                        will be looking out for friends.</p>
                                </div>
                                <div class="comment-count">
                                    <a href="#"><i class="fa fa-reply"></i> Reply (1)</a>
                                    <a href="#"><i class="fa fa-heart"></i> 15</a>
                                </div>
                            </div>
                            <div class="single-comment">
                                <div class="comment-img">
                                    <img src="{{ asset('FrontEnd/images/graverter.jpg') }}" alt="author">
                                </div>
                                <div class="comment-content comment-form">
                                    <form action="#">
                                        <textarea></textarea>
                                        <input type="submit" value="Comment">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/.blog-item-->


            </div>
            <!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form">
                        <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!--/.search-->


                <div class="widget archieve">
                    <h3>Categories</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="blog_archieve">
                                <li><a href="#">December 2013 <span class="pull-right">(97)</span></a></li>
                                <li><a href="#">November 2013 <span class="pull-right">(32)</span></a></li>
                                <li><a href="#">October 2013 <span class="pull-right">(19)</span></a></li>
                                <li><a href="#">September 2013 <span class="pull-right">(08)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.archieve-->



                {{--  <div class="widget blog_gallery">
                    <h3>Our Gallery</h3>
                    <ul class="sidebar-gallery clearfix">
                        <li>
                            <a href="#"><img src="images/sidebar-g-1.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/sidebar-g-2.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/sidebar-g-3.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/sidebar-g-4.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/sidebar-g-5.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/sidebar-g-6.png" alt="" /></a>
                        </li>
                    </ul>
                </div>
                <!--/.blog_gallery-->  --}}

                <div class="widget social_icon">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-linkedin"></a>
                    <a href="#" class="fa fa-pinterest"></a>
                    <a href="#" class="fa fa-github"></a>
                </div>

            </aside>
        </div>
        <!--/.row-->
    </div>
</section>
<!--/#blog-->
@endsection
@push('scripts')
<script src="{{ asset('FrontEnd/js/modal-video.js') }}"></script>
<script>
    var video = new ModalVideo('.js-modal-btn');
</script>
@endpush
