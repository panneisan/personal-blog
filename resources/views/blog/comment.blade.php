@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 list-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> <i class="feather-list text-primary"></i> Comment</h4>
                                <div class="">
                                    <a href="" class="btn btn-outline-primary btn-maximize"><i class="feather-maximize-2"></i></a>
                                </div>
                            </div>
                            <hr><nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Comment-list</li>

                                </ol>
                            </nav>
                            <table class="table table-striped mb-0 sub-list" id="data-table">
                                @if($comment->count() < 1 )
                                    <tbody>
                                      <tr class="">
                                          <td colspan="12" class="text-center">There is no comments</td>
                                      </tr>
                                    </tbody>
                                @else
                                <tr>
                                    <th>No</th>
                                    <th>Comments</th>
                                    <th>User-Name</th>
                                    <th>User-id</th>
                                    <th>Post-id</th>
                                    <th>Controls</th>
                                </tr>
                                <tbody>

                                    @foreach($comment as $c)
                                        <tr>
                                            <td>{{$c->id}}</td>
                                            <td>{{$c->content}}</td>
                                            <td>{{$c->getUser->name}}</td>
                                            <td>{{$c->getUser->id}}</td>
                                            <td>{{$c->post_id}}</td>
                                            <td>
                                                <form action="{{route('show-hide',$c->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn {{$c->status == 'show' ? 'btn-outline-danger':'btn-outline-primary'}}">
                                                        @if($c->status == 'show')
                                                            <i class="feather-eye-off"></i>
                                                        @else
                                                            <i class="feather-eye"></i>
                                                        @endif
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
