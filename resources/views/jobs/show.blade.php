@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
                    <h3>Description</h3>
                    <p>
                        {{$job->description}}
                    </p>
                    <h3>Duties</h3>
                    <p>{{$job->roles}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>

                <div class="card-body">
                    <p>Company:<a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                        {{$job->company->cname}}
                    </a>
                    </p>
                    <p>Address:{{$job->address}}</p>
                    <p>Job Type:{{$job->type}}</p>
                    <p>Position:{{$job->position}}</p>
                    <p>Posted:{{$job->created_at->diffForHumans()}}</p>
                    <p>Last Date:{{date('F d, Y',strtotime($job->last_date))}}</p>
                </div>
            </div>
            <br>
            @if(Auth::check()&&Auth::user()->user_type=='seeker')
                @if(!$job->checkApplication())
                   {{--  <form action="{{route('apply',[$job->id])}}" method="Post">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm" style="width:100%">Apply</button>
                    </form> --}}
                    {{-- jobid={{$job->id}} --}}
                    <div id="app">
                    <apply-component :jobid={{$job->id}} ></apply-component>
                    </div>
                    <br>

                @endif
                {{-- <div id="app">
                    <favourite-component :jobid={{$job->id}} :favourited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                </div> --}}
                 @if(!$job->checkSaved())
                     <form action="{{route('save',[$job->id])}}" method="Post">
                        @csrf
                        <button type="submit" class="btn btn-success" style="width:100%">save</button>
                    </form>
                @else
                <form action="{{route('unsave',[$job->id])}}" method="Post">
                    @csrf
                    <button type="submit" class="btn btn-dark" style="width:100%">Unsave</button>
                </form>
                @endif
            @endif

         {{--    @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif --}}
        </div>

    </div>
</div>
@endsection
