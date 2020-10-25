@extends("frontend.master")

@section('title')Personal Details @endsection
@section('explore-btn')
    <a href="{{route('blog.show')}}" class="btn btn-light animate__animated animate__fadeIn ani-dalay-5">
        <i class="feather-plus-circle"></i>
        Explore My Blogs
    </a>
@stop
@section("content")
    <div class="row h-full d-flex justify-content-center align-items-center p-2 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 px-md-2 animate__animated animate__fadeIn ani-dalay-5">
                    <div class="aboutme px-2 text-justify">
                        <h3 class="text-center">ABOUT ME</h3>
                        <p class="text-justify">
                            My name is Pann Ei San and I live in Yangon, Myanmar. I have got a bachelor’s degree of Electronic and Communication  in Thanlyin Technological University.I'm writing to this to show my interest to apply this opportunity which is open in your organization.
                            <br>
                            <br>
                            I completed in web programming such as web design and development course:
                            <br>
                            html5,CSS3,jQuery,Bootstrap,php,laravel.And I known the basic knowledge of networking,CCNA (routing and switching),can draw autocad.Then I can use design application such as photoshop a little but not a professional level.
                        </p>
                    </div>
                    <div class="row px-2">

                    </div>
                </div>
                <div class="col-12 col-md-7 px-md-3 animate__animated animate__fadeIn ani-dalay-5" >
                    <h3 class="text-center">MY SKILLS</h3>
                    <br>
                            <div class="" id="skill">
                                @foreach($skills as $s)
                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-animated progress-bar-striped bg-dark" role="progressbar" style="width: {{$s->percentage}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                    {{$s->percentage}}%
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">{{$s->name}}</div>
                                    </div>
                                @endforeach
                            </div>
                    {{$skills->links()}}
                </div>
            </div>

            <div class="row mt-3">
                <div class="container wow animate__fadeIn ani-dalay-1">
                    <h3 class="text-center">MY PROJECTS</h3>
                    <div class="row mt-5">
                        @foreach($project as $p)
                        <div class="col-12 col-md-3 mb-2">
                            <a href="" target="_blank" class="text-dark">
                                <div class="single-project">
                                    <i class="feather-activity"></i>
                                    <br>
                                    <a href="{{$p->url}}" target="_blank">{{$p->name}}</a>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet animi a
                                speriores aspernatur consectetur, earum error esse iusto maiores,
                                maxime nesciunt, numquam rem repellat! Aut illo porro quidem saepe tempora!</p>
                        </div>

                    </div>
                    <br>
                    <!--                    blog post    -->
                    <div class="container mt-3">
                        <h3 class="font-weight-bold text-center" style="text-decoration: underline">Latest Post From Blog</h3>
                        <p class="text-center">Hey GUY! Warmly welcome you to read my blog posts.Here are very interesting and exciting posts you
                            can read that.
                        </p>
                        <br>
                        <div class="row mt-2 blog-slide" id="blog-slide">
                            @foreach($post as $pt)
                            <div class="col-12 col-md-4">
                                <div class="card">
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
                                                <a href="{{route('blog.show')}}" class="h4">{{$pt->title}}</a>
                                            <br>
                                                <a href="{{route('blog.detail',$pt->id)}}" class="text-justify text-dark">
                                                    {{substr($pt->description,0,100)}}....
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
    </div>

@endsection
@section('script')
    <script>
        new WOW().init();
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
