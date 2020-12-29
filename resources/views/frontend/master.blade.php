<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/animate_it/animate.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/light_box/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/feather-icon/feather.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield("title")</title>

</head>
<body class="">
<!--header-->
<div class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12">
            <!--            header section-->
            <div class="header" id="header">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <img src="{{asset('img/2.jpg')}}" class="animate__animated animate__slideInDown ani-dalay-1" id="header-img" alt="">
                    </div>
                    <div class="col-md-4">
                        <h1 class="animate__animated animate__slideInDown ani-dalay-2">Hello Guys!</h1>
                        <h2 class=" animate__animated animate__fadeIn ani-dalay-4">It's Me</h2>
                        <h2 class=" animate__animated animate__fadeInUp ani-dalay-3">Pann Ei San</h2>
                        <br>
                        @yield('explore-btn')
                    </div>
                    <div class="col-md-2 d-md-none"></div>
                </div>
            </div>
            <!--            navigation-->
            <div class="position-sticky d-flex justify-content-between" id="navbar">
                <div class="main-header container">
                    @yield('navbar')
                </div>
                @yield('auth')
            </div>

            <!--            about-->
            <div class="container-fluid" id="about">
                @yield("content")
            </div>

        </div>
    </div>
</div>
<!--footer-->
<div class="container-fluid  footer text-white" id="contact">
    <div class="row wow animate__slideInDown ani-dalay-1">
        <div class="col-12 col-md-4 p-lg-2 p-sm-0 p-md-0">
            <h3>This is About</h3>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolor ea expedita explicabo maxime porro quam repellendus sunt velit, vero! Alias amet ducimus eveniet fuga non perspiciatis quis sapiente unde?</p>
        </div>
        <div class="col-12 col-md-4">
            <h3>Contact Info</h3>
            <br>
            <p>Phone : <a href="tel:09262648024">09262648024</a></p>
            <p>Email : <a href="mailTo:www.pannei5297@gmail.com">panneisan5297@gmail.com</a></p>
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
<div class="scroll-to-top bg-light text-dark text-center shadow" style="display: none">
    <i class="feather-chevron-up"></i>
</div>


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('vendor/light_box/lightbox-plus-jquery.min.js')}}"></script>
<script src="{{asset('vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('vendor/wow/wow.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

@yield('script')
<script>
    $(".scroll-to-top").click(function () {
        $("html").animate({
            scrollTop:0
        },1000);
    });

    $(window).scroll(function () {
        let current = $(this).scrollTop();
        if(current > $("#about").offset().top){
            $(".scroll-to-top").fadeIn(500);
        }else{
            $(".scroll-to-top").fadeOut(500);

        }
    });
</script>
</body>
</html>
