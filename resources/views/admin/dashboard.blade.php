@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card dash-card shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="">
                                    <h1><i class="feather-users"></i></h1>
                                </div>
                                <div class="">
                                    <h1>{{Auth::user()->count()}}</h1>
                                    <a href="{{route("user.index")}}" class="text-dark font-weight-bolder">Total Users</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section("foot")

    @endsection
