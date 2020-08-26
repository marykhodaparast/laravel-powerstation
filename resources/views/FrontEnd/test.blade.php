{{-- Start:jquery validation --}}
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
    $(document).ready(function () {
        $('#register_form').validate({
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
    });
</script>
{{-- End:jquery validation --}}
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
{{-- Start:ajax for login & register --}}
<script type="text/javascript">
    function ajaxForm(url,form_id,successDiv){

        var result = false;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: $(form_id).serialize(),
            async: false,
            success: function (data) {
                document.getElementById(successDiv).style.display = 'block';
                result = true;
                $('#registerBtn').html('Join now');
                $('#registerBtn').css('opacity',1);
                $('#registerBtn').removeAttr('disabled');
            },
            error: function (data) {
                //if(form_id=='login_form'){
                var text_data = eval("(" + data.responseText + ")");
                $.each( Object.keys(text_data.errors), function( key, value ) {
                    display_error(Object.values(text_data.errors)[key],'#'+value,'#'+value+'-error');
                });

                // }else if(form_id=='register_form'){

                //}

            }
        });
        return result;


    }
</script>
<script>
    function ajaxLoginForm(url,form_id,successDiv){
        var result = false;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: $(form_id).serialize(),
            async: false,
            success: function (data) {
                document.getElementById(successDiv).style.display = 'block';
                result = true;

            },
            error: function (data) {
                var text_data = eval("(" + data.responseText + ")");
                //console.log(text_data.errors);
                $.each( Object.keys(text_data.errors), function( key, value ) {
                    display_error(Object.values(text_data.errors)[key],'.'+value,'.'+value+'-error'+'1');
                });
                $('#registerBtn').html('Join now');
                $('#registerBtn').css('opacity',1);
                $('#registerBtn').removeAttr('disabled');


            }
        });
        return result;
    }
</script>
{{-- End:ajax for login & register --}}
{{-- Start:submit login & register forms --}}
<script type="text/javascript">

    j('#register_form').on('submit',function(event){
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
{{-- End:submit login & register forms --}}