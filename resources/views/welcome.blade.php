@extends('layouts.main')

@section('content')


{{-- Template Hero Section --}}
    @include('partials.hero')
{{-- Template End --}}
{{-- Category Section --}}
    @include('partials.category')
{{-- End Category --}}



{{-- Frontend --}}
{{-- <div class="container-fluid"
style="background-image: url('{{ asset('cover/h1_hero.jpg')}}');background-size:cover;background-repeat: no-repeat;
background-position: center center;">
<div class="row">
    <div class="col-md-10">

    <div class="jumbotron">
        <h1 class="display-2">Find the most <br>exciting startup <br>jobs</h1> --}}
        <!-- form -->
        {{-- <br> --}}
        {{-- <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
    {{--     <div id="app">
        <search-component style="width: 50%; border-radius:0%"></search-component>
        </div>
        <br>
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="{{route('all.jobs')}}" role="button">Browsw All Jobs</a>
        </p>
    </div>
</div>
</div>
</div> --}}


{{-- Jobs --}}
<div class="services">
    <div class="container ">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="section-heading">
                  <h2>Featured <em>Jobs</em></h2>
                  <span>Aliquam id urna imperdiet libero mollis hendrerit</span>
                </div>
            </div>

            <div class="filter-result">
                @foreach($jobs as $job)
                <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                    <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                        <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                            <img src="{{asset('upload/logo')}}/{{$job->company->logo}}" alt="" style="width: 50px">
                        </div>
                        <div class="job-content">
                            <h5 class="text-center text-md-left">{{$job->title}}</h5>
                            <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                <li class="mr-md-2">
                                    <i class="zmdi zmdi-pin mr-2"></i> {{$job->address}}
                                </li>
                                <li class="mr-md-2">
                                    <i class="fas fa-calendar-alt"></i> &nbsp Date:{{$job->created_at->diffForHumans()}}
                                </li>
                                <li class="mr-md-3">
                                     Position:{{$job->position}}
                                </li>
                                <li class="mr-md-3">
                                    <i class="zmdi zmdi-time mr-2"></i>{{$job->type}}
                                </li>
                                <li class="mr-md-2">
                                    <i class="zmdi zmdi-time mr-2"></i>{{$job->salary}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="job-right my-4 flex-shrink-0">
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn d-block w-100 d-sm-inline-block btn-light">Apply now</a>
                    </div>
                </div>
            </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <a href="{{route('all.jobs')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
          </div>
    </div>
</div>
{{-- Frontend --}}

@include('partials.testimonial')

{{-- Register --}}
<div class="site-blocks-cover overlay inner-page" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6 text-center" data-aos="fade">
          <h1 class="h3 mb-0">Your Dream Job</h1>
          <p class="h3 text-white mb-5">Is Waiting For You</p>
          @if(!Auth::check())
          <p><a href="{{ route('register') }}" class="btn btn-outline-warning py-3 px-4">Seeker</a> <a href="{{route('employer.register')}}" class="btn btn-warning py-3 px-4">Employer</a></p>
            @else
                @if(Auth::user()->user_type=='seeker')
                    <a class="btn btn-outline-warning py-3 px-4" href="{{route('profile.view')}}">Seeker Dashboard</a>
                @else
                    <a class="btn btn-outline-warning py-3 px-4" href="{{route('company.create')}}">Employer Dashboard</a>
                @endif
            @endif
        </div>
      </div>
    </div>
</div>
  {{-- Register end --}}

  {{-- Why Choose us --}}

  <div class="site-section site-block-feature bg-light">
    <div class="container">

      <div class="text-center mb-5 section-heading">
        <h2>Why Choose Us</h2>
      </div>

      <div class="d-block d-md-flex border-bottom">
        <div class="text-center p-4 item border-right" data-aos="fade">
          <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>
          <h2 class="h4">More Jobs Every Day</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
          <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
        </div>
        <div class="text-center p-4 item" data-aos="fade">
          <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
          <h2 class="h4">Creative Jobs</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
          <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
        </div>
      </div>
      <div class="d-block d-md-flex">
        <div class="text-center p-4 item border-right" data-aos="fade">
          <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
          <h2 class="h4">Healthcare</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
          <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
        </div>
        <div class="text-center p-4 item" data-aos="fade">
          <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>
          <h2 class="h4">Finance &amp; Accounting</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
          <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
        </div>
      </div>
    </div>
  </div>


  {{-- why Choose us end --}}

  {{-- Blog --}}
    @include('partials.blog')
  {{-- Blog Post --}}

@include('partials.footer')
@endsection


