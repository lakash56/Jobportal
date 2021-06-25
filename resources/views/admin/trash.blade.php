@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
             <div class="alert alert-success">{{Session::get('message')}}</div>

        @endif
        <div class="section-heading">
            <h3>Trash<em>posts</em></h3>
            </div>
        <div class="row">
            <div class="col-md-3">
                @include('admin.sidenav')
            </div>
            <div class="col-md-9">
                <div class="card">
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
                                <a href="" class="badge badge-success">Live</a>
                            @else
                                <a href="" class="badge badge-primary">Draft</a>
                            @endif
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('post.restore',[$post->id])}}"class="btn btn-success btn-sm">Restore</a>
                        </td>

                      </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
        </div>
        </div>
    </div>



@endsection
