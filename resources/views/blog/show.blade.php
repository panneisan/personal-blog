@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card mb-4 list-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-list text-primary"></i> Post Details</h4>
                                <div class="">
                                    <a href="{{route('post.index')}}" class="btn btn-outline-primary mr-1"><i class="feather-list"></i></a>
                                    <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-primary mr-1"><i class="feather-edit-2"></i></a>
                                </div>
                            </div>
                            <hr>
                            <img src="{{asset("$post->photo")}}" class="card-img" alt="" style="height: 300px">
                            <hr>
                            <h4 class="font-weight-bolder">{{$post->title}}</h4>
                             <p>{{$post->description}}</p>
                            <h5>Category:{{$post->getCategory->cat_title}}</h5>
                            <br>
                            <strong>Posted By:{{Auth::user()->name}}</strong>
                            <br>
                            <strong>Posted At:{{$post->created_at->diffforhumans() }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop
