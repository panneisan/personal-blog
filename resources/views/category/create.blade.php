@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-plus-circle text-primary"></i>Add Category</h4>
                                <div class="">
                                    <a href="{{route("category.index")}}" class="btn btn-outline-primary "><i class="feather-list"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                                    <li class="breadcrumb-item" aria-current="page">Add-Category</li>
                                </ol>
                            </nav>
                            <form action="{{route('category.store')}}" method="post">
                                @csrf
                                <div class="from-group">
                                    <label for="cat_title">Enter Your Category Title</label>
                                    <input type="text" id="cat_title" name="cat_title" class="form-control" value="{{old('cat_title')}}">
                                    @error("cat_title")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <br>
                                <button class="btn btn-primary"><i class="feather-plus-circle"></i>Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.toast')
@endsection
