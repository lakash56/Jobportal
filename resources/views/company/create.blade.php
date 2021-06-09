@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))
            <img src=" {{asset('avatar/avatar6.png')}}" width="100" style="width:100%">
            @else
            <img src="{{asset('upload/logo')}}/{{Auth::user()->company->logo}}" style="width:100%">
            @endif
            <hr>

            <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                <div class="card-header">
                Update Logo
                </div>
                <div class="card-body">
                    <input type="file" class="form-control" name="logo">
                    <br>
                    <button class="btn btn-success float-right">Update</button>
                         @if ($errors->has('logo'))
                    <div class="error" style="color:red">
                        {{$errors->first('logo')}}
                    </div>
                    @endif
                </div>
                </div>
            </form>
        </div>




        <div class="col-md-5">
            <form action="{{route('company.store')}}" method="POST">
                @csrf
            <div class="card">
                <div class="card-header"> Update your Company Information</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Address</label>
                        <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}">
                    </div>

                    <div class="form-group">
                        <label for=""> Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->company->phone}}">
                    </div>

                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website" value="{{Auth::user()->company->website}}">
                    </div>

                    <div class="form-group">
                        <label for="">Slogan</label>
                        <input type="text" class="form-control" name="slogan" value="{{Auth::user()->company->slogan}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control">{{Auth::user()->company->description}}</textarea>
                    </div>
                    {{-- ---------------------------------- --}}

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
                    About Your Company

                </div>
                <div class="card-body">
                    <p>Company Name: {{Auth::user()->company->cname}}</p>
                    <p>Company Address: {{Auth::user()->company->address}}</p>
                    <p>Contact Number: {{Auth::user()->company->phone}}</p>
                    <p>Company Website: <a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a></p>
                    <p>Company slogan: {{Auth::user()->company->slogan}}</p>
                    <p>About Us: {{Auth::user()->company->description}}</p>
                    <p>Company Page <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                </div>
            </div>
            <hr>
            {{-- ================================ --}}
            <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                   Update Cover Photo
                </div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cove_photo">
                    <br>
                    <button class="btn btn-success float-right">Update</button>
                  @if ($errors->has('cover_photo'))
                    <div class="error" style="color:red">
                        {{$errors->first('cover_photo')}}
                    </div>
                    @endif
                </div>
            </form>
            </div>
        </div>

    </div>
</div>
@endsection
