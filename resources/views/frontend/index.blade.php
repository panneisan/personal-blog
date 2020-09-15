@extends("frontend.master")

@section('title')Personal Details @endsection

@section("content")
    <div class="row h-full d-flex justify-content-center align-items-center p-2 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 px-md-2">
                    <div class="aboutme px-2 text-justify">
                        <h3 class="text-center">ABOUT ME</h3>
                        <p>
                            I'm graduated from Thanlyin Technological University,majoring with <b>Electronic and Communication</b> Engineering.
                            <br>
                            I'm also completed in Web Design and Development Course:HTML,CSS,JS,Bootstrap,jQuery,API,PHP,Laravel.And also completed in networking
                            basic and can use designing tools such photoshop.
                        </p>
                    </div>
                    <div class="row px-2">
                        <div class="col-md-6 mb-1">
                            <div class="text-center about-text">
                                <i class="feather-activity text-warning" style="font-size: 30px"></i>
                                <br>
                                <strong>6</strong>
                                <p>Total Projects</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="text-center about-text">
                                <i class="feather-users text-info" style="font-size: 30px"></i>
                                <br>
                                <strong>7</strong>
                                <p>Total Students</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 px-md-3" id="skill">
                    <h3 class="text-center">MY SKILLS</h3>
                    <br>
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
                    {{$skills->links()}}
                </div>
            </div>

            <div class="row mt-3">
                <div class="container">
                    <h3 class="text-center">MY PROJECTS</h3>
                    <div class="row mt-5">
                        <div class="col-12 col-md-4 mb-2">
                            <a href="" target="_blank" class="text-dark">
                                <div class="single-project">
                                    <i class="feather-activity"></i>
                                    <br>
                                    <a href="https://pesmarketing.000webhostapp.com" target="_blank">Marketing</a>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <a href="" target="_blank" class="text-dark">
                                <div class="single-project">
                                    <i class="feather-activity"></i>
                                    <br>
                                    <a href="https://vsttravelandtour.000webhostapp.com/" target="_blank">Tour Management</a>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <a href="" target="_blank" class="text-dark">
                                <div class="single-project">
                                    <i class="feather-activity"></i>
                                    <br>
                                    <a href="https://mydasboarddesign.000webhostapp.com/" target="_blank">Admin Dashboard</a>
                                </div>
                            </a>
                        </div>

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
                        <div class="row mt-2">
                            <div class="col-12 col-md-4">
                                <div class=" mb-3">
                                    <div class="">
                                        <a href="">
                                            <img src="{{asset('img/rose/1.png')}}" class="card-img-bottom" alt="">
                                        </a>
                                        <br>
                                        <small class="text-dark font-weight-bold">25 May,2020|By Pann Ei San</small>
                                        <br>
                                        <a href="{{route('blog.show')}}" class="h4">How Can I be a professional Developer?</a>
                                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi enim in itaque non ullam! Distinctio officiis pariatur provident  vel.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class=" mb-3">
                                    <div class="">
                                        <a href="">
                                            <img src="{{asset('img/rabbit/1.jpg')}}" class="card-img-bottom" alt="">
                                        </a>
                                        <br>
                                        <small class="text-dark font-weight-bold">25 May,2020|By Pann Ei San</small>
                                        <br>
                                        <a href="{{route('blog.show')}}" class="h4">How Can I be a professional Developer?</a>
                                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi enim in itaque non ullam! Distinctio officiis pariatur provident  vel.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class=" mb-3">
                                    <div class="">
                                        <a href="">
                                            <img src="{{asset('img/rabbit/2.jpg')}}" class="card-img-bottom" alt="">
                                        </a>
                                        <br>
                                        <small class="text-dark font-weight-bold">25 May,2020|By Pann Ei San</small>
                                        <br>
                                        <a href="{{route('blog.show')}}" class="h4">How Can I be a professional Developer?</a>
                                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi enim in itaque non ullam! Distinctio officiis pariatur provident  vel.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
