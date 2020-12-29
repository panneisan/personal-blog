@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-plus-circle text-primary"></i>Add project</h4>
                                <div class="">
                                    <a href="{{route("project.index")}}" class="btn btn-outline-primary "><i class="feather-list"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Project</li>
                                    <li class="breadcrumb-item" aria-current="page">Add-Project</li>
                                </ol>
                            </nav>
                            <form action="{{route('project.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="from-group">
                                    <label for="name">Enter Your Project Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                    @error("name")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="from-group">
                                    <label for="url">Enter Your Project Url</label>
                                    <input type="text" name="url" class="form-control" value="{{old('url')}}">
                                    @error("url")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="form-inline d-flex justify-content-start align-items-center">
                                        <div class="position-relative">
                                            <button type="button" class="btn btn-light position-absolute edit-photo" style="bottom: 5px;right: 15px">
                                                <i class="fas fa-edit text-primary"></i>
                                            </button>
                                            <img src="{{asset("/images/1.jpg")}}" style="height: 200px;width: 200px" class="mr-2 rounded current-img" alt="">
                                        </div>
                                        <input type="hidden" name="original" id="original" value="">
                                        <input type="file" name="photo" id="file-upload" accept="image/png,image/jpeg,image/jpg" onchange='openFile(event)' class="form-control d-none flex-grow-1 p-1 mr-2">
                                        @error("photo")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="feather-plus"></i>Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mb-0 sub-list" id="data-table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Url</th>
                                    <th>Controls</th>
                                    <th>Upload-Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $pj)
                                    <tr>
                                        <td>{{$pj->id}}</td>
                                        <td>
                                            <img src="{{asset($pj->photo)}}" class="w-25 rounded rounded-circle" alt="">
                                        </td>
                                        <td>{{$pj->name}}</td>
                                        <td>{{$pj->url}}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('project.edit',$pj->id) }}" class="btn btn-sm btn-outline-info mr-1">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('project.destroy',$pj->id)}}" class="" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button href="" onclick="return confirm('Do You Really want to delele?')" class="btn btn-sm btn-outline-danger text-left w-100">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="no-warp">{{ $pj->created_at->diffforhumans()  }}</td>
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
    @include('layouts.toast')
@endsection
@section("foot")
    <script>
        $(".edit-photo").click(function () {
            $("#file-upload").click();
        });

        var openFile = function(event) {
            var input = event.target;

            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var output = $(".current-img");
                output.attr("src",dataURL);
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>
@endsection
