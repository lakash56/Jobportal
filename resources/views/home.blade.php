@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->user_type=='seeker')
            <div class="section-heading">
                <h2>My<em>Jobs</em></h2>
            </div>
            @foreach ($jobs as $job)
            <div class="card">
                <div class="card-header">{{$job->title}}</div>
                <small class="badge badge-primary">{{$job->position}}</small>
                <div class="card-body">
                    {{$job->description}}
                </div>

                <div class="card-header">
                    <span><a href="{{route('jobs.show',[$job->id,$job->slug])}}">Read</a></span>
                    <span class="float-right"><a href="{{route('jobs.show',[$job->id,$job->slug])}}">Late Date: {{$job->last_date}}</a></span>
                </div>
            </div>
            <br>
            @endforeach
            <div class="justify-content-center">
            <a class="btn btn-success" href="{{url('/')}}">Go to Home Page</a>
            </div>
            @else

            @endif
        </div>
    </div>
</div>

@endsection
