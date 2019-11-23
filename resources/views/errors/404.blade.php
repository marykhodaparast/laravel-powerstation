@extends('FrontEnd.layouts.master')
@section('content')
<section class="window-height" id="error" style="background-image: url({{ asset('FrontEnd/images/404.png') }})">
    <div class="container">
         <h1>404</h1>
         <p>Oops! Something is wrong</p>
         <a class="btn btn-primary" href="index.html">Back to home</a>
    </div>
 </section><!--/#error-->
@endsection
