@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
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
                        <img src="{{asset('upload/logo')}}/{{$job->company->logo}}" width="80">
                    </td>
                    <td>Postion:{{$job->position}}
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        <div>
           <a href="{{route('viewalljobs')}}"> <button class="btn btn-success btn-lg" style="width:100%">Browse All Jobs</button></a>
        </div>
        <hr>
        <h1>Fetured Companies</h1>
</div>

<div class="container">
    <div class="row">
        @foreach ($companies as $company)
        <div class="col-md-3">
            <div class="card" style="width: 18rem">
                <img class ="" src="{{asset('upload/logo')}}/{{$company->logo}}" style="float: left;width:100%;height:100px;object-fit: cover;" >
                <div class="card-body">
                    <h5 class="card-title">{{$company->cname}}</h5>
                    <p class="card-text">{{str_limit($company->description,20)}}</p>
                <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
       </div>
        @endforeach

    </div>
</div>
@endsection
<style>
    .fa{
        color: #4183D7;
    }
</style>

