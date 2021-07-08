@extends('layouts.main')
@section('content')
<div class="container-fluid py-5" >
    <div class="row justify-content-center" >
        <div class="col-md-12" style="color: #ffffff">

          <div class="jumbotron justify-content-center" style="background-image: url({{asset('upload/coverphoto')}}/{{$company->cover_photo}});" >
            <div class="section-heading">
                <h2 class="display-4"><em>{{$company->cname}}</em></h2>
              </div>


            <hr class="my-4">
            <p class="text-center">
                Slogan-{{$company->slogan}} &nbsp; Address{{$company->address}}- &nbsp; Phone-{{$company->phone}}<br>
                <a class="btn btn-primary" href="{{ route('company.create') }}">
                    Edit My Info
                </a>

            </p>

          </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="company-profile">
                {{-- @if (empty($company->cover_photo))
                    <img src={{ asset('cover/mycom.jpg') }} style="width: 100%;">
                    @else
                    <img src="{{asset('upload/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%">
                @endif --}}
                <h3>{{$company->cname}}</h3>
                <div class="row">

                    <div class="col-md-3">

                        @if (empty($company->logo))
                        <img src={{ asset('avatar/avatar6.png ')}} style="width: 100px;">
                        @else
                        <img src="{{asset('upload/logo')}}/{{$company->logo}}" style="width:100%">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <p>{{$company->description}}</p>
                    </div>
                </div>
                <hr>
                <div class="company-desc">
                    <p>Slogan-{{$company->slogan}} &nbsp; Address{{$company->address}}- &nbsp; Phone-{{$company->phone}}&nbsp;
                        Website-{{$company->website}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <h4>My Jobs</h4>
            <table class="table">

                <tbody>
                    @foreach($company->jobs as $job)
                    <tr>
                        <td>
                            <img src="{{asset('upload/logo')}}/{{$company->logo}}" width="80">
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

    </div>
</div>
@include('partials.footer')
@endsection
