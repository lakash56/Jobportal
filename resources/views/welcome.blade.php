@extends('layouts.app')

@section('content')


{{-- Frontend --}}

<div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Featured <em>Jobs</em></h2>
            <span>Aliquam id urna imperdiet libero mollis hendrerit</span>
          </div>
        </div>
        @foreach($jobs as $job)
        <div class="col-md-4">
          <div class="service-item">
            <img src="{{asset('upload/logo')}}/{{$job->company->logo}}" alt="">
            <div class="down-content">
                <br>
              <h4>{{$job->title}}</h4>
              <div style="margin-bottom:10px;">
                <span><i class="fas fa-map-marker-alt"></i>&nbsp; Address:{{$job->address}}</span>
                <br>
                <span><i class="fas fa-calendar-alt"></i> &nbsp Date:{{$job->created_at->diffForHumans()}}</span>
              </div>

              <p>Position:{{$job->position}}</p>

              <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="filled-button">Apply</a>
            </div>
          </div>

          <br>
        </div>
        @endforeach


      </div>
    </div>
</div>

<div class="container">
      <div class="row">
          <div class="col-md-12">
            <a href="{{route('all.jobs')}}"> <button class="btn btn-success btn-lg" style="width:100%">Browse All Jobs</button></a>
          </div>
      </div>
</div>


{{-- Frontend --}}

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

