@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3> <i class="feather-edit-3"></i>Edit User</h3>
                    <nav aria-label="breadcrumb bg-light">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route("user.index")}}">User-List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">user-edit</li>
                        </ol>
                    </nav>
                    <div class="card dash-card shadow">
                        <div class="card-body">
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif

                            <form action="{{ route('user.update',$user->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-inline d-flex justify-content-center align-items-end">
                                        <div class="position-relative">
                                            <button type="button" class="btn btn-light position-absolute edit-photo" style="bottom: 5px;right: 15px">
                                                <i class="fas fa-edit text-primary"></i>
                                            </button>
                                            <img src="{{ asset($user->photo) }}" style="height: 200px" class="mr-2 rounded current-img" alt="">
                                        </div>
                                        <input type="hidden" name="original" id="original" value="{{$user->photo}}">
                                        <input type="file" name="photo"  id="file-upload" accept="image/png,image/jpeg" onchange='openFile(event)' class="form-control d-none flex-grow-1 p-1 mr-2">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="name">Enter New Name</label>
                                    <input type="text" value="{{$user->name}}" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Enter New Email</label>
                                    <input type="text" value="{{$user->email}}" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="role">Choose Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="0" @if($user->role == "0") selected  @endif>0</option>
                                        <option value="1" @if($user->role == "1") selected  @endif>1</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                   <i class="feather-upload-cloud"></i> Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
