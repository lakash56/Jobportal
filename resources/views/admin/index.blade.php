@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if(Session::has('message'))
             <div class="alert alert-success">{{Session::get('message')}}</div>

        @endif
        <div class="section-heading">
            <h3>Blog<em>posts</em></h3>
        </div>
        <div class="row">
            <div class="col-md-2 col-12" >
                @include('admin.sidenav')
            </div>
            <div class="col-md-10 col-12">

                <div class="card">
                    <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">status</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post )
                    <tr>
                        <th><img src="{{asset('storage/'.$post->image)}}" width="50px"></th>
                        <td>{{$post->title}}</td>
                        <td>{{str_limit($post->content,20)}}</td>
                        <td>
                            @if($post->status=='1')
                                <a href="{{route('post.toggle',[$post->id])}}" class="badge badge-success">Live</a>
                            @else
                                <a href="{{route('post.toggle',[$post->id])}}" class="badge badge-primary">Draft</a>
                            @endif
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('post.edit',[$post->id])}}"class="btn btn-success btn-sm">Edit</a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$post->id}}">
                                Delete
                              </button>
                                  <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Do you want to delete this post
                                            </div>
                                            <form action="{{route('post.delete')}}" method="post">
                                                @csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{$post->id}}">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                            </form>
                                        </div>
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

    <div class="container">
        <div class="row justify-content-center">
            {{$posts->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-4')}}
        </div>
    </div>

@endsection
