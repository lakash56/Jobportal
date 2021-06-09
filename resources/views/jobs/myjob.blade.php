@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <td>
                                    @if(empty(Auth::user()->company->logo))
                                    <img src=" {{asset('avatar/avatar6.png')}}" width="100" style="width:80">
                                    @else
                                    <img src="{{asset('upload/logo')}}/{{Auth::user()->company->logo}}" style="width:50%">
                                    @endif
                                </td>
                                <td>
                                    Postion:{{$job->position}}
                                    <br>
                                    <i class="fa fa-clock"></i>
                                    &nbsp {{$job->type}}
                                </td>
                                <td><i class="fa fa-map-marker"></i> &nbsp Address:{{$job->address}}</td>
                                <td><i class="fa fa-globe"></i> &nbsp Date:{{$job->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                    <button class="btn btn-success btn-sm">Apply</button>
                                    </a>
                                    <a href="{{route('job.edit',[$job->id])}}">
                                    <button class="btn btn-dark btn-sm">Edit</button>
                                    </a>
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
@endsection
