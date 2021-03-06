<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- <meta name="description" content=""> --}}
	<meta name="author" content="">
	{{-- <title>fartakEnergy</title> --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- core CSS -->
	<link href="{{asset('FrontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/animate.min.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/icomoon.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('FrontEnd/css/jquery_validation_messages.css') }}" rel="stylesheet">
	<link rel="shortcut icon" href="{{asset('FrontEnd/images/ico/favicon.ico')}}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144"
		href="{{asset('FrontEnd/images/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114"
		href="{{asset('FrontEnd/images/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72"
		href="{{asset('FrontEnd/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed"
		href="{{asset('FrontEnd/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<link rel="stylesheet" href="{{ asset('FrontEnd/css/sweetalert2.min.css') }}">

	@yield('styles')
</head>

<body class="homepage">
	@include('FrontEnd.layouts.header')
	@yield('content')
	@include('FrontEnd.layouts.footer')
	<script src="{{asset('FrontEnd/js/jquery.js')}}"></script>
	<script src="{{asset('FrontEnd/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('FrontEnd/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('FrontEnd/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('FrontEnd/js/jquery.isotope.min.js')}}"></script>
	<script src="{{asset('FrontEnd/js/main.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	{{-- Start:sweetalert2 --}}
	<script src="{{ asset('FrontEnd/js/sweetalert2.all.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="{{ asset('FrontEnd/js/sweetalert2.min.js') }}"></script>

	{{-- End:sweetalert2 --}}

	<script type="text/javascript">
		var j = jQuery.noConflict();
		j.validator.addMethod( 'passwordMatch', function(value, element) {

			// The two password inputs
			var password = $("#password").val();
			var confirmPassword = $("#password_confirmation").val();

			// Check for equality with the password inputs
			if (password != confirmPassword ) {
				return false;
			} else {
				return true;
			}

		}, "Your Passwords Must Match");
		//$(document).ready(function () {
			j('#register_form').validate({
				rules: {
					name: {
						required:true,
						minlength:3,
						maxlength:255
					},
					last_name:{
						required:true,
						minlength:3,
						maxlength:255
					},
					email: {
						required: true,
						email: true,//add an email rule that will ensure the value entered is valid email id.
						maxlength: 255,
						maxlength:255
					},
					password: {
						required:true,
						minlength:6,
						maxlength:255
					},
					password_confirmation:{
						required:true,
						minlength:6,
						passwordMatch: true
					}
				},

				messages: {
					password: {
						required:'The password field is required',
						minlength: 'Password must be at least 6 characters long',
						maxlength: 'Password must not be so long'
					},
					password_confirmation:{
						required:'The confirmation is required',
						minlength: 'Password must be at least 6 characters long',
						maxlength: 'Confirmation must not be so long',
						passwordMatch: "Your Passwords Must Match" // custom message for mismatched passwords
					},
					name:{
						required:'The name field is required',
						minlength:'Please enter at least 3 characters',
						maxlength:'name must not be so long '
					},
					last_name:{
						required:'The lastname field is required',
						minlength:'Please enter at least 3 characters',
						maxlength:'lastname must not be so long'
					},
					email:{
						required:'The email field is required',
						email:'Please enter a valid email',
						maxlength:'email must not be so long'
					}

				}
			});

			{{-- $('#login_form').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,//add an email rule that will ensure the value entered is valid email id.
                        maxlength: 255,
                        },
                        password: {
                            required:true,
                            minlength:6
                        },
                },
                messages:{
                    email:{
                        required:'The email field is required',
                        email:'Please enter a valid email'
                    },
                    password: {
                        required:'The password field is required',
                        minlength: 'Password must be at least 6 characters long'
                    }

                }
            }); --}}
		//});
	</script>

	{{-- Start:display validation form errors --}}
	<script type="text/javascript">
		function display_error(data_error,field_id,errorDiv){
			if(data_error){
				$(field_id).removeClass('valid');
				$(field_id).addClass('error');
				$(errorDiv).css("display","block");
				$(errorDiv).text(data_error);
			}
		}
	</script>
	{{-- End:display validation form errors --}}
	<script type="text/javascript">
        var result = false;
		$('#register_form').on('submit',function(event){
			event.preventDefault();

			//ajaxForm('/register',this,'register_success');
			$('#registerBtn').html('please wait...');
			$('#registerBtn').css('opacity',0.5);
			$('#registerBtn').attr('disabled','disabled');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: '/register',
				data: $(this).serialize(),
				async: false,
				success: function (data) {

					document.getElementById('register_success').style.display = 'block';
					result = true;
					$('#registerBtn').html('Join now');
					$('#registerBtn').css('opacity',1);
					$('#registerBtn').removeAttr('disabled');
				},
				error: function (data) {
					$('#registerBtn').html('Join now');
					$('#registerBtn').css('opacity',1);
					$('#registerBtn').removeAttr('disabled');
					//if(form_id=='login_form'){
					var text_data = eval("(" + data.responseText + ")");
					$.each( Object.keys(text_data.errors), function( key, value ) {
						display_error(Object.values(text_data.errors)[key],'#'+value,'#'+value+'-error');
					});

					// }else if(form_id=='register_form'){

					//}

				}
			});
		});

		$("#login_form").submit(function(event){
			event.preventDefault();
			var formID = $(this).closest("form").attr("id");
			if(formID == 'login_form'){
				$result=ajaxLoginForm('/login',this,'login_success');
				if($result){
					location.reload();
				}
			}
		});

	</script>

	@stack('scripts')


</body>
