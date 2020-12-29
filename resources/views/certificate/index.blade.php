@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 list-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-list text-primary"></i> Certificate List</h4>
                                <div class="">
                                    <a href="{{route('certificate.create')}}" class="btn btn-outline-primary"><i class="feather-plus-circle"></i></a>
                                    <a href="" class="btn btn-outline-primary btn-maximize"><i class="feather-maximize-2"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Certificate</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Certificate-list</li>
                                </ol>
                            </nav>
                            <table class="table table-striped mb-0 sub-list" id="data-table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Start-Date</th>
                                    <th>End-Date</th>
                                    <th>Controls</th>
                                    <th>Upload-Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($certificate as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>
                                            <img src="{{asset($c->photo)}}" class="w-50 rounded rounded-circle" alt="">
                                        </td>
                                        <td class="text-nowrap">{{$c->name}}</td>
                                        <td class="text-nowrap">{{$c->Location}}</td>
                                        <td class="text-nowrap">
                                            {{ $c->start_date }} <i class="feather-chevron-right text-primary"></i>  {{ $c->end_date }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{date('h:i A', strtotime($c->start_time))}} <i class="feather-chevron-right"></i>  {{date('h:i A', strtotime($c->end_time))}}
                                        </td>

                                        <td class="no-warp">
                                            <div class="dropdown">
                                                <button id="dLabel"  class="btn btn-outline-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="feather-arrow-right-circle  mb-0" style="vertical-align: middle;"></i>
                                                </button>
                                                <div class="dropdown-menu p-2" aria-labelledby="dLabel">
                                                    <a href="{{ route('certificate.edit',$c->id) }}" class="btn btn-sm btn-outline-warning text-left w-100 d-block mb-2">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <form action="{{ route('certificate.destroy',$c->id)}}" class="" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button href="" onclick="return confirm('Do You Really want to delele?')" class="btn btn-sm btn-outline-danger text-left w-100 mb-2">
                                                            <i class="feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="no-warp">{{ $c->created_at->diffforhumans()  }}</td>
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

