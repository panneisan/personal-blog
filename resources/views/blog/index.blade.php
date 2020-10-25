@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 list-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-list text-primary"></i> Post List</h4>
                                <div class="">
                                    <a href="{{route('post.create')}}" class="btn btn-outline-primary mr-1"><i class="feather-plus-circle"></i></a>
                                    <a href="" class="btn btn-outline-primary btn-maximize"><i class="feather-maximize-2"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Post</li>
                                    <li class="breadcrumb-item" aria-current="page">Post-list</li>
                                </ol>
                            </nav>
                            <table class="table table-striped mb-0 sub-list" id="data-table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>photo</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Controls</th>
                                    <th>Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>
                                            <img src="{{asset($p->photo)}}" class="rounded rounded-circle" style="width: 70px;height: 70px" alt="">
                                        </td>
                                        <td>{{$p->title}}</td>
                                        <td><textarea readonly>{{$p->description}}</textarea></td>
                                        <td>{{$p->getCategory->cat_title}}</td>
                                        <td class="no-warp d-flex justify-content-around align-items-center">
                                            <div class="dropdown">
                                                <button id="dLabel"  class="btn btn-outline-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="feather-arrow-right-circle  mb-0" style="vertical-align: middle;"></i>
                                                </button>
                                                <div class="dropdown-menu p-2" aria-labelledby="dLabel">
                                                    <a href="{{ route('post.edit',$p->id) }}" class="btn btn-sm btn-outline-info text-left mb-2 w-100 d-block">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="{{ route('post.show',$p->id) }}" class="btn btn-sm btn-outline-info text-left mb-2 w-100 d-block post-show">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <form action="{{ route('post.destroy',$p->id)}}" class="d-block" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button href="" onclick="return confirm('Do You Really want to delele?')" class="btn btn-sm btn-outline-danger text-left w-100">
                                                            <i class="feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <a href="{{route('comment.show',$p->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-comments"></i></a>
                                        </td>
                                        <td class="no-warp">{{ $p->created_at->format('Y-M-D h:i')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @include('layouts.toast')
@endsection
    @section('foot')
            <script>
                $(".post-show").click(function () {
                    $('#post-show').modal('show')
                });
            </script>
@stop
