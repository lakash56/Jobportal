@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if(Session::has('message'))
             <div class="alert alert-success">{{Session::get('message')}}</div>

        @endif
        <div class="section-heading">
            <h3>All<em>Users</em></h3>
        </div>
        <div class="row">
            <div class="col-md-2 col-12" >
                @include('admin.sidenav')
            </div>
            <div class="col-md-10 col-12">

                <div class="card">
                    <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Email</th>
                    <th scope="col">Member Since</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <th>

                            @if ($user->user_type=='employer')
                            {{$user->company->cname}}
                            @else
                            {{$user->name}}
                            @endif
                        </th>
                        <td>{{$user->user_type}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>@if ($user->user_type=='employer')
                            {{$user->company->address}}
                            @elseif($user->user_type=='seeker')
                            {{$user->profile->address}}
                            @else
                            --
                            @endif
                        </td>
                        <td>@if ($user->user_type=='employer')
                            {{$user->company->phone}}
                            @elseif($user->user_type=='seeker')
                            {{$user->profile->phone_number}}
                            @else
                            --
                            @endif
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

    <div class="container">
        <div class="row justify-content-center">
            {{$users->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-4')}}
        </div>
    </div>

@endsection
