@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-plus-circle text-primary"></i>Edit Project</h4>
                                <div class="">
                                    <a href="{{route("project.index")}}" class="btn btn-outline-primary "><i class="feather-list"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Project</li>
                                    <li class="breadcrumb-item" aria-current="page">Edit-project</li>
                                </ol>
                            </nav>
                            <form action="{{route('project.update',$project->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="from-group">
                                    <label for="name">Enter Your Project Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$project->name}}">
                                    @error("name")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="from-group">
                                    <label for="url">Enter Your Project Url</label>
                                    <input type="text" name="url" class="form-control" value="{{$project->url}}">
                                    @error("url")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="feather-upload"></i>Update</button>
                            </form>
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

    </script>
@endsection
