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
                    @endif
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
