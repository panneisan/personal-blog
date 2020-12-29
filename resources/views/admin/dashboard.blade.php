@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card mb-3 status-card shadow">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-around">
                                <div class="col-5">
                                    <i class="feather-users h1"></i>
                                </div>
                                <div class="col-7">
                                    <p class="mb-2 h3 font-weight-bolder">
                                        <span class="counter-up">{{Auth::user()->count()}}</span>
                                    </p>
                                    <a href="{{route("user.index")}}" class="mb-0 text-black-50">Total User</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card mb-3 status-card shadow">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-around">
                                <div class="col-5">
                                    <i class="feather-package h1"></i>
                                </div>
                                <div class="col-7">
                                    <p class="mb-2 h3 font-weight-bolder">
                                        <span class="counter-up">{{\App\Post::count()}}</span>
                                    </p>
                                    <a href="{{route('post.index')}}" class="mb-0 text-black-50">Total Post</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card mb-3 status-card shadow">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-around">
                                <div class="col-5">
                                    <i class="feather-layers h1"></i>
                                </div>
                                <div class="col-7">
                                    <p class="mb-2 h3 font-weight-bolder">
                                        <span class="counter-up">{{\App\Category::count()}}</span>
                                    </p>
                                    <a href="{{route('category.index')}}" class="mb-0 text-black-50">Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card mb-3 status-card shadow">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-around">
                                <div class="col-5">
                                    <i class="feather-layout h1"></i>
                                </div>
                                <div class="col-7">
                                    <p class="mb-2 h3 font-weight-bolder">
                                        <span class="counter-up">{{\App\Project::count()}}</span>
                                    </p>
                                    <a href="{{route("project.index")}}" class="mb-0 text-black-50">Total Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card overflow-hidden shadow mb-4 status-card">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h4 class="mb-0">User View</h4>
                                <div class="">
                                    @foreach($users as $u)
                                        <img src="{{ asset($u->photo)}}" style="margin-left: -25px;" class="ov-img avatar" alt="">
                                    @endforeach

                                </div>
                            </div>
                            <canvas id="myChart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-4 list-card">
                        <div class="card-body">
                            <h4 class="mb-0"> <i class="feather-list text-primary"></i> Category List</h4>
                            <hr>
                            <table class="table table-striped mb-0 sub-list">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Controls</th>
                                    <th>Reg Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->cat_title}}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('category.edit',$c->id) }}" class="btn btn-sm btn-outline-warning mr-1">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('category.destroy',$c->id)}}" class="" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button href="" onclick="return confirm('Do You Really want to delele?')" class="btn btn-sm btn-outline-danger">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="no-warp">{{ $c->created_at->diffforhumans()}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{$category->links()}}
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 list-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-list text-primary"></i> User List</h4>
                                <div class="">
                                    <a href="" class="btn btn-outline-primary btn-maximize"><i class="feather-maximize-2"></i></a>
                                </div>
                            </div>
                            <table class="table table-striped mb-0 sub-list" id="data-table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>role</th>
                                    <th>Provider</th>
                                    <th>Controls</th>
                                    <th>Time</th>
                                    <th>Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>
                                            <img src="{{asset("$u->photo")}}" class="avatar rounded rounded-circle img-thumbnail" alt="">
                                        </td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        <td>{{$u->role}}</td>
                                        <td>{{$u->provider}}</td>
                                        <td class="no-warp">
                                            <div class="dropdown">
                                                <button id="dLabel"  class="btn btn-outline-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="feather-arrow-right-circle  mb-0" style="vertical-align: middle;"></i>
                                                </button>
                                                <div class="dropdown-menu p-2" aria-labelledby="dLabel">
                                                    <a href="{{ route('user.edit',$u->id) }}" class="btn btn-sm btn-outline-info text-left mb-2 w-100 d-block">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <form action="{{ route('user.delete',$u->id)}}" class="d-block" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button href="" onclick="return confirm('Do You Really want to delele?')" class="btn btn-sm btn-outline-danger text-left w-100">
                                                            <i class="feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="no-warp">{{ $u->created_at->format("h:i")}}</td>
                                        <td class="no-warp">{{ $u->created_at->format("j.n.y")}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>





        </div>
    </div>
@endsection
@section("foot")
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2,28],
                    backgroundColor: [
                        '#79B5F8'
                    ],
                    borderColor: [
                        '#008BF4'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        display: false,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        display: false
                    }

                    ]
                },
                legend: {
                    display: true,
                    position: "top",
                    labels: {
                        fontColor: "#0062D6",
                        usePointStyle: true
                    }
                }
            }
        });
    </script>
    @endsection
