@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
             <div class="alert alert-success">{{Session::get('message')}}</div>

        @endif
        <div class="row">
            <div class="col-md-4">
                @include('admin.sidenav')
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Post
                    </div>
                    <div class="card-body">
                        <form action="{{route('post.update',[$post->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="from-group">
                                <label>Title</label>

                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="from-group">
                                <label>Content</label>
                                <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror">{{ $post->content}}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="from-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                <img src="{{asset('storage/'.$post->image)}}" style="width:100%">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <hr>
                            <div class="from-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1"{{$post->status=='1'?'selected':''}}>Live</option>
                                    <option value="0"{{$post->status=='0'?'selected':''}}>Draft</option>
                                </select>
                            </div>
                            <div class="from-group py-1">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
