@extends("frontend.master")
@section('title')Post Details @stop
@section("content")
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="post-detail">
                <img src="{{asset('img/rose/1.png')}}" style="height: 300px" class="w-50" alt="">
                <div>
                    <strong>
                        <i class="feather-calendar"></i>
                        Posted On:
                    </strong>
                    25,May 2020
                </div>
                <div>
                    <strong>
                        <i class="feather-user"></i>
                        Auther:
                    </strong>
                    Pann Ei San
                </div>
                <div>
                    <strong>
                        <i class="feather-menu"></i>
                        Category:
                    </strong>
                    Laravel
                </div>
                <br>
                <h4>How Can I be a professional Developer?</h4>
                <p class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. A adipisci aliquid asperiores, blanditiis cum
                    cumque labore maiores molestiae nam omnis ratione re
                    prehenderit saepe voluptates. Dignissimos molestia
                    e possimus quibusdam reiciendis vero!prehenderit saepe voluptates. Dignissimos molestia
                    e possimus quibusdam reiciendis vero!prehenderit saepe voluptates. Dignissimos molestia
                    e possimus quibusdam reiciendis vero!
                </p>
                <button class="btn btn-primary">
                    <i class="feather-heart"></i>
                    Like <span>64</span>
                </button>
                <button class="btn btn-danger">
                    <i class="feather-thumbs-down"></i>
                    Like <span>33</span>
                </button>
                <button class="btn btn-info" data-toggle="collapse" data-target="#commentId">
                    <i class="feather-message-circle"></i>
                    Comment <span>2</span>
                </button>
                <br>
                <br>
                <div class="comment-section collapse" id="commentId">
                    <form action="">
                        <textarea name="" class="p-1" id="" cols="60" rows="10" placeholder="Write Something"></textarea>
                        <br>
                        <button class="btn btn-sm-primary"><i class="feather-send"></i>Send</button>
                    </form>
                    <br>
                    <div class="d-flex justify-content-start align-items-center message-box">
                        <img src="{{asset('img/rabbit/4.jpg')}}" style="width: 40px;height: 40px" class="rounded rounded-circle mr-2" alt="">
                        <div class="">
                            <small>
                                <strong>
                                    Pann Ei San
                                </strong>
                            </small>
                            <br>
                            you're so nice
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-start align-items-center message-box">
                        <img src="{{asset('img/rose/4.jpg')}}" style="width: 40px;height: 40px" class="rounded rounded-circle mr-2" alt="">
                        <div class="">
                            <small>
                                <strong>
                                    Pann Ei San
                                </strong>
                            </small>
                            <br>
                            wow
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
