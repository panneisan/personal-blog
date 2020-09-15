@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-plus-circle text-primary"></i>Add Skill</h4>
                                <div class="">
                                    <a href="{{route("skill.index")}}" class="btn btn-outline-primary "><i class="feather-list"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Skill</li>
                                    <li class="breadcrumb-item" aria-current="page">Add-Skill</li>
                                </ol>
                            </nav>
                            <form action="{{route('skill.store')}}" method="post">
                                @csrf
                                <div class="from-group">
                                    <label for="name">Enter Your Skill Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                    @error("name")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="from-group">
                                    <label for="percentage">Enter Your Skill Percentage</label>
                                    <input type="number" name="percentage" class="form-control" value="{{old('percentage')}}">
                                    @error("percentage")
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <br>
                                <button class="btn btn-primary"><i class="feather-plus"></i>Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mb-0 sub-list" id="data-table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Percentage</th>
                                    <th>Controls</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($skill as $sk)
                                    <tr>
                                        <td>{{$sk->id}}</td>
                                        <td>{{$sk->name}}</td>
                                        <td>{{$sk->percentage}}</td>
                                        <td class="no-warp">
                                            <div class="dropdown">
                                                <button id="dLabel"  class="btn btn-outline-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="feather-arrow-right-circle  mb-0" style="vertical-align: middle;"></i>
                                                </button>
                                                <div class="dropdown-menu p-2" aria-labelledby="dLabel">
                                                    <a href="{{ route('skill.edit',$sk->id) }}" class="btn btn-sm btn-outline-info text-left mb-2 w-100 d-block">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <form action="{{ route('skill.destroy',$sk->id)}}" class="d-block" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button href="" onclick="return confirm('Do You Really want to delele?')" class="btn btn-sm btn-outline-danger text-left w-100">
                                                            <i class="feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
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
