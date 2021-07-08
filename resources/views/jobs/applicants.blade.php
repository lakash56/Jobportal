@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach ($applicants as $applicant)
                <div class="card-header"><a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}">{{$applicant->title}}</a></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>address</th>
                            <th>Gender</th>
                            <th>Bio</th>
                            <th>Experince</th>
                            <th>Resume</th>
                            <th>Cover Letter</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        @foreach ($applicant->users as $user)
                        <tbody>
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->profile->address}}</td>
                            <td>{{$user->profile->gender}}</td>
                            <td>{{$user->profile->bio}}</td>
                            <td>{{$user->profile->experience}}</td>
                            <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>
                            <td><a href="{{Storage::url($user->profile->cover_letter)}}">Cover Letter</a></td>
                            <td>
                                @if ($user->pivot->status == 1)
                                                        <a href="{{ route('select.toggle', [$user->id, $applicant->id]) }}"
                                                            class="badge badge-success">Selected</a>
                                                    @else
                                                        <a href="{{ route('select.toggle', [$user->id,$applicant->id]) }}"
                                                            class="badge badge-primary">pending</a>
                                                    @endif
                            </td>

                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                      <hr>
                </div>


                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
