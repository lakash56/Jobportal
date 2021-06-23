@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

            <div class="card">
                <div class="card-header">Add New Job</div>
                <div class="card-body">

                    <form action="{{route('job.update',[$jobs->id])}}" method="POST">
                        @csrf
                    <div class="form-group">,
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control
                        @error('title') is-invalid @enderror" value="{{$jobs->title}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        value="">{{$jobs->description}}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles:</label>
                        <textarea name="roles" class="form-control @error('roles') is-invalid @enderror"
                        value="">{{ $jobs->roles }}</textarea>

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
                                <option value="{{$cat->id}}"{{$cat->id==$jobs->category_id?'selected':''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ $jobs->position }}">

                        @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $jobs->address }}">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- New  --}}
                    <div class="form-group">
                        <label for="address">Number of Vacancy</label>
                        <input type="number" name="no_of_vacancy" class="form-control @error('no_of_vacancy') is-invalid @enderror" value="{{ $jobs->number_of_vacancy }}">

                        @error('no_of_vacancy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- end --}}
                    {{-- experience --}}
                     <div class="form-group">
                        <label for="address">Year of Experience</label>
                        <input type="number" name="experience_year" class="form-control @error('experience_year') is-invalid @enderror" value="{{$jobs->experience_year}}">

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
                            <option value="any"{{$jobs->gender =='any'?'selected':''}}>Any</option>
                            <option value="male"{{$jobs->gender =='male'?'selected':''}}>Male</option>
                            <option value="female"{{$jobs->gender =='female'?'selected':''}}>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Salary:</label>
                        <select class="form-control" name="salary">
                            <option value="negotiable"{{$jobs->salary =='negotiable'?'selected':''}}>Negotiable</option>
                            <option value="10000-20000"{{$jobs->salary =='10000-20000'?'selected':''}}>10000-20000</option>
                            <option value="20000-30000"{{$jobs->salary =='20000-30000'?'selected':''}}>20000-30000</option>
                            <option value="30000-50000"{{$jobs->salary =='30000-50000'?'selected':''}}>30000-50000</option>
                            <option value="60000 plus"{{$jobs->salary =='60000 plus'?'selected':''}}>60000 plus</option>
                        </select>
                    </div>
                    {{-- new --}}
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" name="type">
                            <option value="fulltime"{{$jobs->type =='fulltime'?'selected':''}}>Fulltime</option>
                            <option value="parttime"{{$jobs->type =='parttime'?'selected':''}}>Parttime</option>
                            <option value="Freelancer"{{$jobs->type =='freelancer'?'selected':''}}>Freelancer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status">
                            <option value="1"{{$jobs->status =='1'?'selected':''}}>Live</option>
                            <option value="0"{{$jobs->status =='0'?'selected':''}}>Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="last_date">Last Date:</label>
                        <input type="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{$jobs->last_date}}">

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
    </div>
</div>
@endsection
