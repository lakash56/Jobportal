@extends('layouts.main')

@section('content')

<div class="container-fluid py-5">
    <div class="row justify-content-center">

        <form action="{{ route('search.job.options') }}" method="GET">
                @csrf
                <div class="form-inline">
                    <div class="form-group mx-sm-3">
                        <label>Keyword&nbsp;</label>
                        <input type="text" name="title" class="form-control">&nbsp;
                    </div>
                    <div class="form-group">
                        <label>Employement type &nbsp;</label>
                        <select class="form-control" name="type">
                            <option disabled selected>--Select--</option>
                            <option value="fulltime">Full Time</option>
                            <option value="parttime">Part Time</option>
                            <option value="freelancer">Freelancer</option>
                        </select>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label>Category&nbsp;</label>
                        <select name="category_id" class="form-control">
                            <option disabled selected>--Select--</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label>Address </label>
                        <input type="text" name="address" class="form-control">&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </div>

                </div>
        </form>
        {{-- {!! $jobs->links() !!} --}}
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
    </div>
    <div class="row justify-content-center">
        @if($jobs)
        <div class="filter-result">
            @foreach($jobs as $job)
                <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                    <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                        <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                            <img src="{{asset('upload/logo')}}/{{$job->company->logo}}" alt="" style="width: 50">
                        </div>
                        <div class="job-content">
                            <h5 class="text-center text-md-left">{{$job->title}}</h5>
                            <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                <li class="mr-md-4">
                                    <i class="zmdi zmdi-pin mr-2"></i> {{$job->address}}
                                </li>
                                <li class="mr-md-4">
                                    <i class="fas fa-calendar-alt"></i> &nbsp Date:{{$job->created_at->diffForHumans()}}
                                </li>
                                <li class="mr-md-4">
                                    <i class="zmdi zmdi-time mr-2"></i> Position:{{$job->position}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="job-right my-4 flex-shrink-0">
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn d-block w-100 d-sm-inline-block btn-light">Apply now</a>
                    </div>
                </div>
            @endforeach
        </div>
        @else
         <div class="alert alert-danger text-center">search type does not exists...</div>

        @endif

    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        {{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-4')}}
    </div>
</div>


@include('partials.footer')
@endsection
<style>
    .fa{
        color: #4183D7;
    }
</style>
