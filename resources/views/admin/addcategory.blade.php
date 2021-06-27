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
                        Add Category
                    </div>
                    <div class="card-body">
                        {{-- {{route('post.update',[$post->id])}} --}}
                        <form action="{{route('admin.addcategory')}}" method="post">
                            @csrf
                            <div class="from-group">
                                <label>Add Category</label>

                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>

                            <div class="from-group py-1">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            Category
                        </div>
                        <div class="card-body">
                        <ul>
                            @foreach ($categories as $category)
                                <li class="list-group-item">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
