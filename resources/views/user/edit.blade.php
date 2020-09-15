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
                                    <label for="name">Enter New Name</label>
                                    <input type="text" value="{{$user->name}}" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Enter New Photo</label>
                                    <input type="file" value="{{$user->photo}}" class="form-control py-1" id="photo" name="photo">
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

@endsection
