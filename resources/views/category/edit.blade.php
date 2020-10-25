@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-plus-circle text-primary"></i>Edit Category</h4>
                                <div class="">
                                    <a href="{{route("category.index")}}" class="btn btn-outline-primary "><i class="feather-list"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                                    <li class="breadcrumb-item" aria-current="page">Edit-category</li>
                                </ol>
                            </nav>
                            <form action="{{route('category.update',$category->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="from-group">
                                    <label for="cat_title">Enter Your Category Name</label>
                                    <input type="text" name="cat_title" id="cat_title" class="form-control" value="{{$category->cat_title}}">
                                    @error("cat_title")
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
