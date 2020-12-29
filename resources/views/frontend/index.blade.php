<div class="loader-container">
    <div class="spinner">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
</div>
<style>
    .loader-container{
        display: flex;
        justify-content: center;
        align-items: center;
        background: white;
        height:100vh;
        width: 100%;
        position: fixed;
        z-index: 2000;
    }
    .spinner {
        width: 150px;
        height: 150px;
        position: relative;
        /*   border: 1px solid black; */
        animation: spin 3s linear infinite;
    }

    .spinner .circle:nth-child(1) {
        width: 20px;
        height: 20px;
        border-radius: 0%;
        background: #000000;
        position: absolute;
        top: 0;
        left: 0;
        transform: scale(1);
        animation: positionToCenter 1s ease-in infinite;
        animation-direction: alternate;
    }

    .spinner .circle:nth-child(2) {
        width: 20px;
        height: 20px;
        border-radius: 0;
        background: gray;
        position: absolute;
        top: 0;
        right: 0;
        transform: scale(1) translate(0%,0%);
        animation: positionToCenter 1s ease-in infinite;
        animation-direction: alternate;
    }

    .spinner .circle:nth-child(3) {
        width: 20px;
        height: 20px;
        border-radius: 0%;
        background: gray;
        position: absolute;
        bottom: 0;
        left: 0;
        transform: scale(1) translate(0%,0%);
        animation: positionToCenter 1s ease-in infinite;
        animation-direction: alternate;
    }

    .spinner .circle:nth-child(4) {
        width: 20px;
        height: 20px;
        border-radius: 0%;
        background: #000000;
        position: absolute;
        bottom: 0;
        right: 0;
        transform: scale(1) translate(0%,0%);
        animation: positionToCenter 1s ease-in infinite;
        animation-direction: alternate;
    }



    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes positionToCenter {
        to {
            left: 50%;
            top: 50%;
            bottom: 50%;
            right: 50%;
            transform: scale(2) translate(-50%,-50%);
            background: black;
            border-radius: 50%;
        }
    }
</style>
@extends("frontend.master")

@section('title')Personal Details @endsection
@section('explore-btn')
    <a href="{{route('blog.show')}}" class="btn btn-light animate__animated animate__fadeIn ani-dalay-5">
        <i class="feather-plus-circle"></i>
        Explore My Blogs
    </a>
@stop
@section('navbar')
    <nav class="nav navbar-expand-md animate__animated animate__slideInDown ani-dalay-5" id="nav-list">
        <ul class="nav-list" >
            <li class="nav-item active"><a href="{{url('/')}}">Home</a></li>
            <li class="nav-item"><a href="#about">About</a></li>
            <li class="nav-item"><a href="#skill">Certificate</a></li>
            <li class="nav-item"><a href="#project">Project</a></li>
            <li class="nav-item"><a href="#blog">Blog</a></li>
            <li class="nav-item  contact"><a href="#contact">Contact Us</a></li>
        </ul>
    </nav>
@stop
@section("content")
    <div class="row h-full d-flex justify-content-center align-items-center">
        <div class="container-fluid">
{{--            about--}}
            <div class="row align-items-center min-h-100">
                @foreach($about as $about)
                <div class="col-12 col-md-6 mt-md-2">
                    <div class="text-right mr-5 mr-md-0 animate__animated animate__fadeInLeft ani-dalay-4">
                        <img src="{{asset($about->photo)}}" class="about-img w-75 content-2" alt="" style="height: 300px">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="animate__animated animate__fadeInRight ani-dalay-4" style="background-image: url({{asset('img/bg-2.svg')}}">
                        <p class="text-secondary about_text">Biography</p>
                        <h4 class="text-dark text-uppercase about_text">{{$about->title}}</h4>
                        <p class="text-black-50 py-4 text-justify">
                            {{$about->about_text}}
                        </p>
                        <p class="text-dark">
                            It's 2019.
                        </p>
                        <a href="#skill" class="btn btn-outline-dark text-uppercase about-btn">See More</a>
                    </div>
                </div>
                @endforeach
            </div>
{{-- certificate --}}
            <div class="row align-items-center py-2 py-md-5 min-h-100" style="background: honeydew" id="skill">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="my-2 mb-2 ">
                                    <h2 class="wow animate__animated animate__slideInDown ani-dalay-1 text-dark  text-center text-uppercase">My Certificates</h2>
                                </div>
                                <br>
                            </div>
                            @foreach($certificate as $c)
                            <div class="col-12 col-md-4">
                                <div class="card shadow certificate-card wow slideInRight ani-delay-1">
                                    <div class="card-body">
                                        <a href="{{asset($c->photo)}}" data-lightbox="example-set" data-title="{{$c->name}}">
                                            <img src="{{asset($c->photo)}}" class=" " alt="">
                                        </a>
                                        <p class="font-weight-bolder text-primary my-4">
                                            <i class="feather-credit-card"></i> : {{$c->name}}
                                        </p>
                                        <p class="font-weight-bolder  text-dark my-4">
                                            <i class="feather-calendar"></i> : {{$c->start_date}} To {{$c->end_date}}
                                        </p>
                                        <p class="font-weight-bolder  text-dark my-4">
                                            <i class="feather-map-pin"></i> : {{$c->location}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
{{--            project--}}
            <div class="row mt-2 align-items-center py-3 py-md-5 min-h-50" id="project">
                <div class="container wow animate__fadeIn ani-dalay-1">
                    <h3 class="text-center">MY PROJECTS</h3>
                    <br>

                    <div class="row ">
                        @foreach($project as $p)
                        <div class="col-12 col-md-3 mb-2">
                            <div class="card mb-3 status-card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-7">
                                            <a href="{{$p->url}}" target="_blank" class="mb-0 text-black-50">{{$p->name}}</a>
                                        </div>
                                        <div class="col-5">
                                            <img src="{{asset($p->photo)}}" style="width: 70px;height: 70px" class="rounded rounded-circle" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        {{--      project       --}}

                    <!--                    blog post    -->
            <div class="row align-items-center py-3 py-md-5 min-h-100" style="background: honeydew" id="blog">
                <div class="container mt-3 text-dark">
                    <div class="row pt-3">
                        <div class="col-12">
                            <h3 class="font-weight-bold text-center" style="text-decoration: underline">Latest Post From Blog</h3>
                            <p class="text-center">Hey GUY! Warmly welcome you to read my blog posts.Here are very interesting and exciting posts you
                                can read that.
                            </p>
                        </div>
                    </div>
                    <div class="row mt-2 blog-slide" id="blog-slide">
                        @foreach($post as $pt)
                            <div class="col-12 col-md-4">
                                <div class="card blog-card">
                                    <div class="card-body">
                                        <div class=" mb-3">
                                            <a href="{{asset($pt->photo)}}" data-lightbox="example-set" data-title="{{$pt->title}}">
                                                <img src="{{asset($pt->photo)}}" class="card-img-top" alt="">
                                            </a>
                                            <hr>
                                            <small class="text-dark font-weight-bold">{{$pt->created_at->format('Y-M-D')}}|By
                                                @if(auth()->check())
                                                    {{Auth::user()->name}}
                                                @else
                                                    Admin
                                                @endif
                                            </small>
                                            <br>
                                            <a href="{{route('blog.show')}}">{{$pt->title}}</a>
                                            <br>
                                            <a href="{{route('blog.detail',$pt->id)}}" class="text-justify text-dark">
                                                {{substr($pt->description,0,200)}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
    </div>
    </div>

@endsection
@section('script')

    <script>
        $(".blog-slide").slick({
            arrows:false,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>
@endsection
