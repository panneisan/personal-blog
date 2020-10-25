@extends("frontend.master")
@section('title')Blog @endsection
@section('explore-btn')
    <a href="{{route('page')}}" class="btn btn-light">
        <i class="feather-home"></i>
        Go To Home
    </a>
@stop
@section('auth')
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
@stop
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">
                        @foreach($posts as $p)
                        <div class="blog">
                            <a href="{{asset($p->photo)}}" data-lightbox="example-set" data-title="{{$p->title}}">
                                <img src="{{asset($p->photo)}}" alt="" style="height: 250;width: 200px">
                            </a>
                            <h4>{{$p->title}}</h4>
                            <p class="text-justify">{{substr($p->description,0,200)}}.....</p>
                            <a href="{{route("blog.detail",$p->id)}}" class="btn btn-primary">Read More <i class="feather-chevrons-right"></i></a>
                            <br>
                        </div>
                        @endforeach
                            {{$posts->links()}}
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="sidebar">
                            <form action="{{route('search')}}" method="get">
                                @csrf
                                <div class="form-inline">
                                    <input type="text" name="search_data" class="form-control" placeholder="Search ...">
                                    <button class="btn btn-success">
                                        <i class="feather-search"></i>
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <h5> Categories</h5>
                            <ul>
                                @foreach($categories as $c)
                                <li><a href="{{route('search.category',$c->id)}}">{{$c->cat_title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    lightbox.option({
    maxHeight: 700,
    maxWidth: 700,
    'resizeDuration': 200,
    'wrapAround': true
    })
@endsection
