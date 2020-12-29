@extends("frontend.master")
@section('title')Post Details @stop
@section('explore-btn')
    <a href="{{route('blog.show')}}" class="btn btn-light">
        <i class="feather-plus-circle"></i>
        Explore My Blogs
    </a>
@stop
@section('navbar')
    <nav class="nav navbar-expand-md animate__animated animate__slideInDown ani-dalay-5" id="nav-list">
        <ul class="nav-list" >
            <li class="nav-item"><a href="{{url('/')}}">Home</a></li>
            <li class="nav-item active"><a href="{{route('blog.show')}}">Blog</a></li>
            <li class="nav-item  contact"><a href="#contact">Contact Us</a></li>
        </ul>
    </nav>
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
        <div class="col-12 col-md-12">
            <div class="post-detail">
                <img src="{{asset($post->photo)}}" style="height: 300px" class="w-25" alt="">
                <div>
                    <strong>
                        <i class="feather-calendar"></i>
                        Posted On:
                    </strong>
                    {{$post->created_at}}
                </div>
                <div>
                    <strong>
                        <i class="feather-user"></i>
                    </strong>
                    {{Auth::user()->name}}
                </div>
                <div>
                    <strong>
                        <i class="feather-menu"></i>
                        Category:
                    </strong>
                    {{$post->getCategory->cat_title}}
                </div>
                <br>
                <h4>{{$post->title}}</h4>
                <p class="text-justify">
                    {{$post->description}}
                </p>
                <hr>
                <form action="" method="post">
                    <div class="d-flex justify-content-sm-around w-25">
                        <span>{{$like->count()}} <space> Like</space></span>
                        <span>{{$dislike->count()}} <space> Dislike</space></span>
                        <span>{{$comment->count()}} <space> Comment</space></span>
                    </div>
                    <hr>
                    @csrf
                    <div class="d-flex justify-content-around w-25">
                        <button type="submit" formaction="{{url('/post-like',$post->id)}}" class="btn btn-primary"
                       @if($likeStatus)
                       @if($likeStatus->type =="like")
                       disabled
                            @endif
                           @endif
                        >
                            <i class="feather-heart"></i>
                            Like
                        </button>
                        <button type="submit" formaction="{{url('/post-dislike',$post->id)}}" class="btn btn-danger"
                                @if($likeStatus)
                                @if($likeStatus->type =="dislike")
                                disabled
                            @endif
                            @endif
                        >
                            <i class="feather-thumbs-down"></i>
                            DisLike
                        </button>
                        <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#commentId">
                            <i class="feather-message-circle"></i>
                            Comment
                        </button>
                    </div>
                </form>
                <br>
                <div class="comment-section collapse" id="commentId">
                    <form action="{{route('comment',$post->id)}}" method="post">
                        @csrf
                        <textarea name="content" class="p-1 form-control" id="" cols="60" rows="5" placeholder="Write Something" required></textarea>
                        <br>
                        <button type="submit" class="btn btn-sm-primary"><i class="feather-send"></i>Send</button>
                    </form>
                    <br>
                    @foreach($comment as $c)
                    <div class="d-flex justify.-content-start align-items-center message-box mb-2">
                        <img src="{{asset($c->getUser->photo)}}" style="width: 40px;height: 40px" class="rounded rounded-circle mr-2" alt="">
                        <div class="">
                            <small>
                                <strong>
                                    {{$c->getUser->name}}
                                </strong>
                            </small>
                            <br>
                            {{$c->content}}
                        </div>
                    </div>
                    @endforeach
                    <br>
                </div>
            </div>
        </div>

    </div>
@endsection
