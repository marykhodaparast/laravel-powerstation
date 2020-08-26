<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="top-number">
                        <p><i class="fa fa-phone-square"></i> +98 921 5202940</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.top-bar-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a> -->
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="{{ route('about_us') }}">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    {{--  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i
                                class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="{{ route('404') }}">404</a></li>
                        </ul>
                    </li>  --}}
                    <li><a href="{{ route('products.all') }}">Products</a></li>
                    <li><a href="{{ route('news.all') }}">Blog</a></li>
                    <li><a href="contact-us.html">Contact</a></li>
                       {{-- <form method="post" action="{{ route('logout') }}">
                    @csrf
                    {{-- <button type="submit">logout</button> --}}
                    {{-- </form> --}}
                    @auth
                    <li>
                        @if(auth()->user()->is_admin == 1)
                        <a href="{{ route('admin.index') }}">Dashboard</a>
                        @else
                        <a href="#" data-toggle="modal" data-target="#register">Dashboard</a>
                        @endif
                    </li>
                    @else
                    <li>
                        <a href="#" data-toggle="modal" data-target="#register">Register/Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
        <!--/.container-->
    </nav>
    <!--/nav-->
    {{-- Start:modal for login/register--}}
    <div class="modal fade" id="register">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:none;">
                    <button type="button" class="close margin-bottom-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <ul class="nav nav-tabs final-login">
                                    <li class="active"><a data-toggle="tab" href="#sectionA" class="text-center">Sign
                                            In</a></li>
                                    <li><a data-toggle="tab" href="#sectionB" class="text-center">Join us!</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="sectionA" class="tab-pane fade in active">
                                        <div class="innter-form">
                                            <form class="sa-innate-form" method="post" id="login_form" action="/login">
                                                @csrf
                                                <div class="row p-right-left">
                                                    <label>Email Address</label>
                                                    <input type="email" name="email">
                                                    <label class="error display_none email-error"></label>
                                                </div>
                                                <div class="row p-right-left">
                                                    <label>Password</label>
                                                    <input type="password" name="password">
                                                    <label class="error display_none password-error"></label>
                                                </div>
                                                <div class="alert alert-success display_none" id="login_success">
                                                    succesfully logged-in!
                                                </div>
                                                <button type="submit" class="btnModalValid">Sign In</button>
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            </form>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="sectionB" class="tab-pane fade">
                                        <div class="innter-form">
                                            <form class="sa-innate-form" method="post" id="register_form"
                                                action="/register">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                        <input type="text" name="name" id="name">
                                                        <label class="error display_none" id="name-error"></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>LastName</label>
                                                        <input type="text" name="last_name" id="last_name">
                                                        <label class="error display_none" id="last_name-error"></label>
                                                    </div>
                                                </div>
                                                <label>Email Address</label>
                                                <input type="email" name="email" id="email">
                                                <label class="error display_none" id="email-error"></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Password</label>
                                                        <input type="password" name="password" id="password">
                                                        <label class="error display_none" id="password-error"></label>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="password_confirmation"
                                                            id="password_confirmation">
                                                        <label class="error display_none"
                                                            id="password_confirmation-error"></label>
                                                    </div>
                                                </div>
                                                <div class="alert alert-success display_none" id="register_success">
                                                    An activation link has been sent to your email.please check your
                                                    email.
                                                </div>
                                                <button type="submit" class="btnModalValid" id="registerBtn">Join now</button>
                                                <p>By clicking Join now, you agree to hifriendss User Agreement,
                                                    Privacy Policy, and Cookie Policy.</p>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End:modal for login/register--}}
    </div>

</header>
