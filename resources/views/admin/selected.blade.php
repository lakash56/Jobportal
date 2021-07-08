@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if(Session::has('message'))
             <div class="alert alert-success">{{Session::get('message')}}</div>

        @endif
            @if(Session::has('err_message'))
            <div class="alert alert-danger">
                {{Session::get('message')}}
            </div>
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
                            @if ($user->pivot->status == 1)

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

                                    <a href="#"data-toggle="modal" data-target="#mailModel" style="float:right;" class="btn btn-primary btn-sm">Send Confirmation Mail</a>
                                    {{-- Model --}}
                                    <div class="modal fade" id="mailModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Sent job to your Friend</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{route('confirm.email')}}"  method="POST">
                                                @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="job_id" value="{{$user->id}}">
                                                    <div class="form-group">
                                                    <label>Candidate Name</label>
                                                    <input type="text" name="username" class="form-control" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Candidate Email</label>
                                                        <input type="email" name="useremail" class="form-control" value="{{$user->email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Content</label>
                                                            <textarea type="text" name="content" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Insert a meet link</label>
                                                            <input type="text" name="link" class="form-control" value="https://meet.google.com/xjt-hhwx-uja">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Interview Date</label>
                                                            <input type="date" name="date" class="form-control" required="">
                                                        </div>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Send Email</button>
                                            </div>
                                        </form>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                              </tr>
                            @endif

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

{{--     <div class="container">
        <div class="row justify-content-center">
            {{$users->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-4')}}
        </div>
    </div>
 --}}


@endsection
