<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/feather-icon/feather.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield("title")</title>
</head>
<body>
<!--header-->
<div class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12">
            <!--            header section-->
            <div class="header" id="header">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <img src="{{asset('img/2.jpg')}}" id="header-img" alt="">
                    </div>
                    <div class="col-md-4">
                        <h1>Hello Guys!</h1>
                        <h2>It's Me</h2>
                        <h2>Pann Ei San</h2>
                        <br>
                        <a href="{{route('blog.show')}}" class="btn btn-light">
                            <i class="feather-plus-circle"></i>
                            Explore My Blogs
                        </a>
                    </div>
                    <div class="col-md-2 d-md-none"></div>
                </div>
            </div>
            <!--            navigation-->
            <div class="position-sticky d-flex justify-content-between" id="navbar">
                <div class="main-header container">
                    <nav class="nav navbar-expand-md" id="nav-list">
                        <ul class="nav-list" >
                            <li class="nav-item active"><a href="{{url('/')}}">Home</a></li>
                            <li class="nav-item"><a href="#about">About</a></li>
                            <li class="nav-item"><a href="#skill">Skill</a></li>
                            <li class="nav-item"><a href="{{route('blog.show')}}">Blog</a></li>
                            <li class="nav-item  contact"><a href="#contact">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="d-flex justify-content-around px-3">
                    @if(Auth::check())
                        <a href="" class="text-light">{{strtoupper(Auth::user()->name)}}</a>


                        <a href="" class="text-light px-2" onclick="event.preventDefault();if(confirm('Are you really want to Logout?')){
                                    document.getElementById('logout-form').submit()
                                }">
                            Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" class="d-none" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>


                    @else
                        <a href="{{ route('login') }}" class="text-light">Login</a>
                        <a href="{{ route('register') }}" class="px-2 text-light">Register</a>
                    @endif
                </div>
            </div>

            <!--            about-->
            <div class="container-fluid" id="about">
                @yield("content")
            </div>

        </div>
    </div>
</div>
<!--footer-->
<div class="container-fluid footer text-white" id="contact">
    <div class="row">
        <div class="col-12 col-md-4 p-lg-2 p-sm-0 p-md-0">
            <h3>This is About</h3>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolor ea expedita explicabo maxime porro quam repellendus sunt velit, vero! Alias amet ducimus eveniet fuga non perspiciatis quis sapiente unde?</p>
        </div>
        <div class="col-12 col-md-4">
            <h3>Contact Info</h3>
            <br>
            <p>Phone : <a href="tel:09262648024">09262648024</a></p>
            <p>Email : <a href="mailTo:www.panneisan5297@gmail.com">panneisan5297@gmail.com</a></p>
        </div>
        <div class="col-12 col-md-3">
            <h3>Follow Me On</h3>
            <br>
            <div class="d-flex">
                <a href="https://www.facebook.com/va.santhii.5297/" target="_blank" class="btn btn-outline-light"><i class="feather-facebook"></i></a>
                <a href="https://www.instagram.com/pann8387/" target="_blank" class="btn btn-outline-light mr-3 ml-3"><i class="feather-instagram"></i></a>
                <a href="https://twitter.com/thii_va" target="_blank" class="btn btn-outline-light mr-3"><i class="feather-twitter"></i></a>
                <a href="https://www.linkedin.com/in/pann-ei-san-408a58175/" target="_blank" class="btn btn-outline-light"><i class="feather-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
<script>

</script>
</html>
