@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if(Session::has('message'))
             <div class="alert alert-success">{{Session::get('message')}}</div>

        @endif
        <div class="row">
            <div class="col-md-2">
                @include('admin.sidenav')
            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <form action="{{route('testimonial.store')}}" method="post">
                            @csrf
                            <div class="from-group">
                                <label>Content</label>
                                <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="from-group">
                                <label>Profession</label>
                                <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror">{{ old('content') }}
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="from-group">
                                <label>Video_id</label>
                                <input type="text" name="video_id" class="form-control @error('video_id') is-invalid @enderror">
                                @error('video_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="from-group py-1">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
