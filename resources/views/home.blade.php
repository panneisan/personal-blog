<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset(\App\Custom::$info['main_css']) }}">
    <link rel="stylesheet" href="{{asset('theme/vendor/feather-icons-web/feather.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendor/animate_it/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/data_table/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <title>Document</title>
</head>
<body>
<div class="p-2 d-flex px-0 shadow-sm  rounded justify-content-end align-items-center header animate__animated animate__fadeIn">

    <div class="dropdown text-dark">
        <a class="btn btn-light border-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{--                <img src="{{ asset(Auth::user()->photo) }}" class="rounded-circle" style="width: 30px" alt="">--}}
            <span class="d-lg-inline">
                    {{ Auth::user()->name }}
                </span>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button onclick="return confirm('Are you want to exit?')" type="submit" class="dropdown-item">Logout</button>
            </form>

        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('theme/js/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="{{ asset('theme/js/bootstrap.js') }}"></script>
<script src="{{ asset('theme/vendor/data_table/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/data_table/dataTables.bootstrap4.min.js') }}"></script>
</body>
</html>
