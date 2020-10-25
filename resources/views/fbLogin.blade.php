@extends('layouts.lite')
@section("title") Login @endsection
@section('head')
    <style>

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 m-auto">
                <div class="card shadow animate__animated animate__zoomInDown">
                    <div class="card-body">
                        <h4>Hello Friends!</h4>
                         <h5>Warmly Welcome To My Blog...😊</h5>
                        <p>Thank you so much for visiting my blog.To secure the process,please verify you to log in with your facebook account...</p>
                        <a href="{{ url('/auth/facebook') }}" class="btn btn-primary font-weight-bold btn-rounded"><i class="feather-facebook"></i> Facebook အကောင့်ဖြင့်ဝင်ပါ</a>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("foot")
    <script>

        console.log(document.cookie.split(';'))
    </script>
@stop
