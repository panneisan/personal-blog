@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-plus-circle text-primary"></i>Add Certificate</h4>
                                <div class="">
                                    <a href="{{route("certificate.index")}}" class="btn btn-outline-primary "><i class="feather-list"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Certificate</li>
                                    <li class="breadcrumb-item" aria-current="page">Add-Certificate</li>
                                </ol>
                            </nav>
                            <form action="{{route('certificate.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="from-group">
                                    <label for="name">Enter Your Degree Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                    @error("name")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="start_date">Stat Date</label>
                                        <input type="date" class="form-control" name="start_date" id="start" value="{{ old('start_date') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="end_date">End Date</label>
                                        <input type="date" class="form-control" name="end_date" id="end" value="{{ old('end_date') }}" required>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label for="location">Enter Your Graduate or Certified Location</label>
                                    <input type="text" name="location" class="form-control" value="{{old('location')}}">
                                    @error("location")
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
