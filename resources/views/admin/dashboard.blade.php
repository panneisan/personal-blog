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
                            <canvas id="myChart" height="100"></canvas>
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
