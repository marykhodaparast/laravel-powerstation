<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--  <style>
        .fa-heart{
            color:red;
        }
        .fa_with_bg{
            position: relative;
        }

        .fa_with_bg::after{
            position: absolute;
            content: '';
            background: #fff;
            z-index: -1;
            top: 10px;
            left: 3px;
            width: 35px;
            height: 33px;
        }
        .glyphsSpriteHeart__outline__24__grey_9{
            background-size:355px 344px;
            background-position:-75px -295px;
            background-image: url('/FrontEnd/images/like.png');
        }

    </style>  --}}
</head>

<body>
    {{--  <button>
        <span aria-label="Like" class="glyphsSpriteHeart__outline__24__grey_9 u-__7">
        </span>
    </button>  --}}
    {{--  <img src="{{ asset('FrontEnd/images/like-2.svg') }}" width="50" height="50"/>  --}}
    {{--  <i class="fa fa-thumbs-up" aria-hidden="true"></i>  --}}
    <button id="like"><i class="fa fa-thumbs-o-up" aria-hidden="true" id="like-hand"></i></button>

    {{--  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>  --}}

    {{--  <i class="fa fa-heart" aria-hidden="true" ></i>  --}}
    {{--  <img src="{{ asset('FrontEnd/images/like.svg') }}" style="width:5%;height:5%;fill:red;"/> --}}
    {{--  <script src='https://kit.fontawesome.com/a076d05399.js'></script>  --}}


</body>
<script src="{{asset('FrontEnd/js/jquery.js')}}"></script>
<script src="{{asset('FrontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('FrontEnd/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('FrontEnd/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('FrontEnd/js/jquery.isotope.min.js')}}"></script>
<script>
        $('#like').click(function(){
            console.log('hellow');
           $('#like-hand').removeClass('fa-thumbs-o-up');
           $('#like-hand').addClass('fa-thumbs-up');
           $('#like-hand').css('color','rgb(86, 109, 255)');
        });
</script>
 {{--  <div class="comment-img">
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
                    </div> --}}
</html>


$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'POST',
    url: '{{ route('products.reply_store',['id'=>$product->id]) }}',
    data: "body=" + event.target[0].value,
    async: false,
    success: function(data) {
        //$('#success-msg').css("display","block");
        <?php
        if (!auth()->check()) {
            echo "noAuth();return;";
        }

        ?>
    },
    error: function(data) {
        console.log(data.responseText);
        Swal.fire({
            title: 'noComment Error!',
            text: 'please write your comment!',
            type: 'error',
            confirmButtonText: 'Cool'
        })
    }
});
