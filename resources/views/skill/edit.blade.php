@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-plus-circle text-primary"></i>Edit Skill</h4>
                                <div class="">
                                    <a href="{{route("skill.index")}}" class="btn btn-outline-primary "><i class="feather-list"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Skill</li>
                                    <li class="breadcrumb-item" aria-current="page">Edit-Skill</li>
                                </ol>
                            </nav>
                            <form action="{{route('skill.update',$skill->id)}}" method="post">
                                @csrf
                                @method("PATCH")
                                <div class="from-group">
                                    <label for="name">Enter Your Skill Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$skill->name}}">
                                    @error("name")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="from-group">
                                    <label for="percentage">Enter Your Skill Percentage</label>
                                    <input type="number" name="percentage" class="form-control" value="{{$skill->percentage}}">
                                    @error("percentage")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="feather-upload"></i>Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.toast')
@endsection
