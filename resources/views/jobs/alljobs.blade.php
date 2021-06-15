@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

    <form action="{{ route('search.job.options') }}" method="post">
        @csrf
        <div class="form-inline">
            <div class="form-group mx-sm-3">
                <label>Keyword&nbsp;</label>
                <input type="text" name="title" class="form-control">&nbsp;&nbsp;&nbsp;
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
                <label>Address</label>
                <input type="text" name="address" class="form-control">&nbsp;&nbsp;&nbsp;
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-success">Search</button>
            </div>

        </div>
    </form>

        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @if($jobs)
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
                @else
                 <div class="alert alert-danger text-center">search type does not exists...</div>
                @endif
                
            </tbody>
        </table>
        {{-- {!! $jobs->links() !!} --}}
        {{-- {{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-4')}} --}}
    </div>
</div>


@endsection
<style>
    .fa{
        color: #4183D7;
    }
</style>

