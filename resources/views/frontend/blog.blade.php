@extends("frontend.master")
@section('title')Blog @endsection
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="blog">
                            <img src="{{asset('img/rose/1.png')}}" class="" alt="">
                            <h4>How Can I be a professional Developer?</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid architecto distinctio iste modi nobis quisquam totam vitae! Culpa
                                delectus ducimus fugit in laborum mollitia nost
                                rum? Earum expedita iste sed.</p>
                            <a href="{{route('blog.detail')}}" class="btn btn-primary">Read More <i class="feather-chevrons-right"></i></a>
                            <br>
                        </div>
                        <div class="blog">
                            <img src="{{asset('img/rabbit/1.jpg')}}" class="" alt="">
                            <h4>How Can I be a professional Developer?</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid architecto distinctio iste modi nobis quisquam totam vitae! Culpa
                                delectus ducimus fugit in laborum mollitia nost
                                rum? Earum expedita iste sed.</p>
                            <a href="{{route("blog.detail")}}" class="btn btn-primary">Read More <i class="feather-chevrons-right"></i></a>
                            <br>
                        </div>
                        <div class="blog">
                            <img src="{{asset('img/rabbit/2.jpg')}}" class="" alt="">
                            <h4>How Can I be a professional Developer?</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid architecto distinctio iste modi nobis quisquam totam vitae! Culpa
                                delectus ducimus fugit in laborum mollitia nost
                                rum? Earum expedita iste sed.</p>
                            <a href="{{route("blog.detail")}}" class="btn btn-primary">Read More <i class="feather-chevrons-right"></i></a>
                            <br>
                        </div>

                    </div>
                    <div class="col-12 col-md-4">
                        <div class="sidebar">
                            <form action="">
                                <div class="form-inline">
                                    <input type="text" class="form-control" placeholder="Search ...">
                                    <button class="btn btn-success">Search</button>
                                </div>
                            </form>
                            <hr>
                            <h5> Categories</h5>
                            <ul>
                                <li><a href="">HTML</a></li>
                                <li><a href="">PHP</a></li>
                                <li><a href="">LARAVEL</a></li>
                                <li><a href="">CSS</a></li>
                                <li><a href="">BOOTSTRAP</a></li>
                                <li><a href="">JQuery</a></li>
                                <li><a href="">JS</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
