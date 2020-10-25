@extends('layouts.app')
@section('head')
    <style>
        #preview{
            width:200px;
        }
        #upload{
            display: none;
        }
        .uploader{
            margin: 5px auto 5px auto;
            background-color: #e3e3e3;
            display: flex;
            justify-content: center;
            padding: 5px;
            border-radius: 20px;
        }
        .uploader i{
            font-size: 70px;
        }
        #gallery{
            width: 100%;
            margin: 10px auto;
            display: inline-block;
        }
        .gallery-img{
            width: 100px;
            padding: 5px;
            border-radius: 20px;
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-plus-circle text-primary"></i>Add Post</h4>
                                <div class="">
                                    <a href="{{route("post.index")}}" class="btn btn-outline-primary "><i class="feather-list"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Post</li>
                                    <li class="breadcrumb-item" aria-current="page">Add-Post</li>
                                </ol>
                            </nav>
                            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Post Title">
                                            @error("title")
                                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="">Select Category</label>
                                            <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $c)
                                                    <option value="{{ $c->id }}" {{ $c->id == old("category_id") ? "selected" : "" }}>{{ $c->cat_title }}</option>
                                                @endforeach
                                            </select>
                                            @error("category_id")
                                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="from-group">
                                    <label for="description">Enter Description</label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                    @error("description")
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
                                            <img src="{{asset("/images/1.jpg")}}" style="height: 200px" class="mr-2 rounded current-img" alt="">
                                        </div>
                                        <input type="hidden" name="original" id="original" value="">
                                        <input type="file" name="photo"  id="file-upload" accept="image/png,image/jpeg" onchange='openFile(event)' class="form-control d-none flex-grow-1 p-1 mr-2">
                                        @error("photo")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <br>
                                <button type="submit" class="btn btn-primary"><i class="feather-plus"></i>Add Post</button>
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
