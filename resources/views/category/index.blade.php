@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 list-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-list text-primary"></i> Category List</h4>
                                <div class="d-flex">
                                    <a href="" class="btn btn-outline-primary btn-maximize mr-1"><i class="feather-maximize-2"></i></a>
                                    <a href="{{route("category.create")}}" class="btn btn-outline-primary"><i class="feather-plus-circle"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                                    <li class="breadcrumb-item" aria-current="page">Category-list</li>
                                </ol>
                            </nav>
                            <table class="table table-striped mb-0 sub-list" id="data-table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Controls</th>
                                    <th>Reg Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->cat_title}}</td>
                                        <td class="d-flex">
                                                <a href="{{ route('category.edit',$c->id) }}" class="btn btn-sm btn-outline-warning mr-1">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <form action="{{ route('category.destroy',$c->id)}}" class="" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button href="" onclick="return confirm('Do You Really want to delele?')" class="btn btn-sm btn-outline-danger">
                                                        <i class="feather-trash-2"></i>
                                                    </button>
                                                </form>
                                        </td>
                                        <td class="no-warp">{{ $c->created_at->diffforhumans()}}</td>
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
