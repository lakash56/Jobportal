@extends('layouts.app')
@section('content')

<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>

    @endif
     <div class="section-heading">
        <h1>All<em>Jobs</em></h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All Jobs
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Position</th>
                            <th scope="col">Company</th>
                            <th scope="col">Last Date</th>
                            <th scope="col">Handle</th>
                            <th scope="col">View</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ( $jobs as $job)
                        <tr>
                            <th scope="row">{{$job->created_at->diffForHumans()}}</th>
                            <td>{{$job->position}}</td>
                            <td>{{$job->company->cname}}</td>
                            <td>{{$job->last_date}}</td>
                            <td>
                                @if($job->status=='1')
                                <a href="{{route('job.status',[$job->id])}}" class="badge badge-success">Live</a>
                            @else
                                <a href="{{route('job.status',[$job->id])}}" class="badge badge-primary">Draft</a>
                            @endif
                            </td>
                            <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}">View Job</a></td>
                          </tr>
                        @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
            <span style="float: right;"><a href="{{route('admin.home')}}" class="btn btn-success">Dashboard</a></span>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        {{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-4')}}
    </div>
</div>
@endsection
