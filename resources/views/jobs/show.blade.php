
@extends('layouts.main')
@section('content')
<div class="container-fluid py-5" style="background-color: #e9ecef">
    <div class="row">
        <div class="col-md-12" style="color: #ffffff">
            {{-- @if (empty($job->company->cover_photo))
            <img src={{ asset('cover/mycom.jpg') }} style="width: 100%;">
            @else
            <img src="{{asset('upload/coverphoto')}}/{{$job->company->cover_photo}}" style="width: 100%">
          @endif --}}
          <div class="jumbotron">
            <h1 class="display-4" color="white">{{$job->title}}</h1>

            <hr class="my-4">
            <p class="lead">{{$job->description}}</p>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="{{route('company.index',[$job->company->id,$job->company->slug])}}" role="button">View Company</a>
            </p>
          </div>
        </div>
    </div>
</div>

<div class="container py-5">
    @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

            @if(Session::has('err_message'))
            <div class="alert alert-danger">
                {{Session::get('message')}}
            </div>
            @endif

            @if(isset($errors)&&count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors as $error )
                    <li>{{$error}}</li>

                    @endforeach
                </ul>
            </div>
            @endif

    <div class="row">
        <div class="col-md-8">
                <h6>About This Role</h6>
                <div class="row">
                    <div class="col-md-3">
                        @if (empty($job->company->logo))
                        <img src={{ asset('avatar/avatar6.png ')}} style="width: 100px;">
                        @else
                        <img src="{{asset('upload/logo')}}/{{$job->company->logo}}" style="width:100%">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <span><strong>{{$job->title}}</strong> ({{$job->type}})</span>
                        <br>
                        <span>{{$job->address}},Nepal | Number of Vacancy:{{$job->number_of_vacancy}} </span>
                        <br>
                        <span>Salary:NRP <strong>{{$job->salary}}</strong> | Years Of Experience:{{$job->experience_year}} Years</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h5>Roles And Responsibilities</h5>
                        <p>{{$job->roles}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>Job Description <a href="#"data-toggle="modal" data-target="#mailModel" style="float:right;">Recommend your Friend: <i class="fas fa-envelope" style="font-size:34px;color:green"></a></i></h5>
                        <p>{{$job->description}}</p>
                    </div>
                </div>

              {{--   <div>
                    <h3>Job Description</h3>
                    <p>
                        {{$job->description}}
                    </p>
                    <h3>Roles And Responsibilities</h3>
                    <p>{{$job->roles}}</p>
                    <h3>Salary</h3>
                    <p>{{$job->salary}}</p>
                    <h3>Years Of Experience</h3>
                    <p>{{$job->experience_year}} Years</p>
                    <h3>Number of Vacancy</h3>
                    <p>{{$job->number_of_vacancy}}</p>
                    <h3>Who can Apply</h3>
                    <p>{{$job->gender}}</p>




                </div> --}}

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Company Short Info</div>

                <div class="card-body">
                    <p>Company:<a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                        {{$job->company->cname}}
                    </a>
                    </p>
                    <p>Position:{{$job->position}}</p>
                    <p>Posted:{{$job->created_at->diffForHumans()}}</p>
                    <p>Last Date:{{date('F d, Y',strtotime($job->last_date))}}</p>
                </div>
            </div>
            <br>
            @if(Auth::check()&&Auth::user()->user_type=='seeker')
                 @if(!$job->checkApplication())
                   <form action="{{route('apply',[$job->id])}}" method="Post">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm" style="width:100%">Apply</button>
                    </form>
                    {{-- jobid={{$job->id}} --}}
                    {{-- <div id="app">
                    <apply-component :jobid={{$job->id}} ></apply-component>
                    </div>
                    <br> --}}

                @endif
                {{-- <div id="app">
                    <favourite-component :jobid={{$job->id}} :favourited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                </div> --}}
                <br>
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



  <!-- Modal -->
  <div class="modal fade" id="mailModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sent job to your Friend</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('mail.send')}}"  method="POST">
            @csrf
        <div class="modal-body">
            <input type="hidden" name="job_id" value="{{$job->id}}">
            <input type="hidden" name="job_slug" value="{{$job->slug}}">
                <div class="form-group">
                <label>Your Name *</label>
                <input type="text" name="your_name" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label>Your Email *</label>
                    <input type="email" name="your_email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Person Name *</label>
                        <input type="text" name="friend_name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Person Email *</label>
                        <input type="email" name="friend_email" class="form-control" required="">
                    </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Mail this Job</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- end --}}


    </div>
</div>

<div class="container py-5">
    <hr>
    <div class="section-heading">
        <h3>Simillar<em>Jobs</em></h3>
    </div>
    <div class="row">

        @foreach ($jobRecommendations as $jobRecommendation)
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <p class="badge badge-success">{{$jobRecommendation->type}}</p>
              <h5 class="card-title">{{$jobRecommendation->position}}</h5>
              <h6>{{$jobRecommendation->title}}</h6>
              <p class="card-text">{{str_limit($jobRecommendation->description,60)}}</p>
              <a href="{{route('jobs.show',[$jobRecommendation->id,$jobRecommendation->slug])}}" class="btn btn-primary">View Job</a>
            </div>
          </div>
        </div>
        @endforeach

    </div>
</div>

@include('partials.footer')
@endsection
