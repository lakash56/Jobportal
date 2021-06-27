@extends('layouts.main')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid" style="width: 100%">
        </div>
        <div class="col-md-9">
            <h1 class="display-4">{{$post->title}}</h1>
            <p>Posted: {{$post->created_at->diffForhumans()}}</p>

            <h6>{{$post->content}}</h6>
        </div>
    </div>
</div>
@include('partials.footer')
@endsection
