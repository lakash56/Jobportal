@extends('layouts.main')
@section('content')

    <div class="container py-5 ">
        <div class="section-heading">
            <h2>Featured <em>Companies</em></h2>
        </div>
        <div class="row">
            @foreach ($companies as $company)
        <div class="col-md-4">
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

    <div class="container">
        <div class="row justify-content-center">
            {{$companies->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-4')}}
        </div>
    </div>


    @include('partials.footer')
@endsection
