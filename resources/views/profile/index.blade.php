@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->avatar))
            <img src=" {{asset('avatar/avatar6.png')}}" width="100" style="width:100%">
            @else
            <img src=" {{asset('upload/avatar')}}/{{Auth::user()->profile->avatar}}" width="100" style="width:100%">
            @endif
            <hr>

            <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                <div class="card-header">
                    Update Profile Picture
                </div>
                <div class="card-body">
                    <input type="file" class="form-control" name="avatar">
                    <br>
                    <button class="btn btn-success float-right">Update</button>
                    @if ($errors->has('avatar'))
                    <div class="error" style="color:red">
                        {{$errors->first('avatar')}}
                    </div>
                    @endif
                </div>
                </div>
            </form>
        </div>




        <div class="col-md-5">
            <form action="{{route('profile.create')}}" method="POST">
                @csrf
            <div class="card">
                <div class="card-header"> Update your profile</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Address</label>
                        <input type="text" class="form-control" name="address" value="{{Auth::user()->profile->address}}">

                        {{-- checking if the field is empty or not if empty shows the error --}}
                        @if ($errors->has('address'))
                        <div class="error" style="color:red">
                            {{$errors->first('address')}}
                        </div>
                        @endif
                        {{-- validation end --}}
                    </div>
                    <div class="form-group">
                        <label for=""> Phone Number</label>
                        <input type="text" class="form-control" name="phone_number">

                         {{-- checking if the field is empty or not if empty shows the error --}}
                         @if ($errors->has('phone_number'))
                         <div class="error" style="color:red">
                             {{$errors->first('phone_number')}}
                         </div>
                         @endif
                         {{-- validation end --}}
                    </div>
                    {{-- ---------------------------------- --}}
                    <div class="form-group">
                        <label for=""> Experience </label>
                        <textarea class="form-control" name="experience">{{Auth::user()->profile->experience}}
                        </textarea>
                         {{-- checking if the field is empty or not if empty shows the error --}}
                         @if ($errors->has('experience'))
                         <div class="error" style="color:red">
                             {{$errors->first('experience')}}
                         </div>
                         @endif
                         {{-- validation end --}}
                    </div>
                    {{-- ---------------------------------------- --}}
                    <div class="form-group">
                        <label for=""> Bio</label>
                        <textarea class="form-control" name="bio">{{Auth::user()->profile->bio}}
                        </textarea>
                         {{-- checking if the field is empty or not if empty shows the error --}}
                         @if ($errors->has('bio'))
                         <div class="error" style="color:red">
                             {{$errors->first('bio')}}
                         </div>
                         @endif
                         {{-- validation end --}}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

        </div>
    </form>
{{-- -------------------------------------------------------------- --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    About Me
                </div>
                <div class="card-body">
                    <p>Name: {{Auth::user()->name}}</p>
                    <p>Email: {{Auth::user()->email}}</p>
                    <p>Address: {{Auth::user()->profile->address}}</p>
                    <p>Contact: {{Auth::user()->profile->phone_number}}</p>
                    <p>Gender: {{Auth::user()->profile->gender}}</p>
                    <p>Experince: {{Auth::user()->profile->experience}}</p>
                    <p>Bio: {{Auth::user()->profile->bio}}</p>
                    <p>Member on: {{date('F D Y',strtotime(Auth::user()->created_at))}}</p>

                    {{-- cover_letter view --}}
                    @if(!empty(Auth::user()->profile->cover_letter))
                        <p><a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover Letter</p>
                    @else
                        <p>Please Update Cover Letter</p>
                    @endif

                    {{-- Resume --}}
                    @if(!empty(Auth::user()->profile->resume))
                            <p><a href="{{Storage::url(Auth::user()->profile->resume)}}">Resume</p>

                    @else
                            <p>Please Update Resume</p>
                            <a href="{{route('profile.cv')}}" class="btn btn-success">Build your CV</a>
                    @endif
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Preview CV
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <iframe src="{{route('resume.profile')}}" title="description" framborder="0"  width="100%" height="900"></iframe>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-primary" href="{{route('resume.download')}}">Download</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            {{-- ================================ --}}
            <form action="{{route('cover.letter')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                    Update Coverletter
                </div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_letter">
                    <br>
                    <button class="btn btn-success float-right">Update</button>
                    @if ($errors->has('cover_letter'))
                    <div class="error" style="color:red">
                        {{$errors->first('cover_letter')}}
                    </div>
                    @endif
                </div>
            </form>
                <hr>

            <form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    Update Resume
                </div>
                <div class="card-body">
                    <input type="file" class="form-control" name="resume">
                    <br>
                    <button class="btn btn-success float-right">Update</button>
                    @if ($errors->has('resume'))
                    <div class="error" style="color:red">
                        {{$errors->first('resume')}}
                    </div>
                    @endif
                </div>
            </form>
            </div>
        </div>

    </div>
</div>
@endsection
