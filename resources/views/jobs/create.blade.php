@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Job</div>
                <div class="card-body">

                    <form action="{{route('jobs.store')}}" method="POST">
                        @csrf
                        {{-- {{$errors}} --}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control
                        @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles:</label>
                        <textarea name="roles" class="form-control @error('roles') is-invalid @enderror" value="{{ old('roles') }}"></textarea>

                        @error('roles')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control">
                            @foreach (App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">

                        @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" name="type">
                            <option value="fulltime">Fulltime</option>
                            <option value="parttime">Parttime</option>
                            <option value="freelancer">Freelancer</option>
                        </select>
                    </div>
                    {{-- No of vacancy --}}
                     <div class="form-group">
                        <label for="address">Number of Vacancy</label>
                        <input type="number" name="no_of_vacancy" class="form-control @error('no_of_vacancy') is-invalid @enderror" value="{{ old('no_of_vacancy') }}">

                        @error('no_of_vacancy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- end --}}
                    {{-- experience --}}
                     <div class="form-group">
                        <label for="address">Experince</label>
                        <input type="number" name="experience_year" class="form-control @error('experience') is-invalid @enderror" value="{{ old('experience') }}">

                        @error('experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- end --}}
                    {{--  --}}
                    <div class="form-group">
                        <label for="status">Gender:</label>
                        <select class="form-control" name="gender">
                            <option value="any">Any</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Salary:</label>
                        <select class="form-control" name="salary">
                            <option value="negotiable">Negotiable</option>
                            <option value="2000-5000">2000-5000</option>
                            <option value="5000-10000">5000-10000</option>
                            <option value="10000-20000">10000-20000</option>
                            <option value="20000-30000">20000-30000</option>
                            <option value="30000-50000">30000-50000</option>
                            <option value="60000 plus">6000 plus</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status">
                            <option value="1">Live</option>
                            <option value="0">Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="last_date">Last Date:</label>
                        <input type="date"  name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{ old('last_date') }}">

                        @error('last_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                    </form>

                </div>
        </div>

        </div>
        <div class="col-md-2">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
