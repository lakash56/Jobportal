@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if(Session::has('message'))
             <div class="alert alert-success">{{Session::get('message')}}</div>

        @endif
        <div class="section-heading">
            <h3>Testimonial<em>posts</em></h3>
        </div>
        <div class="row">
            <div class="col-md-2">
                @include('admin.sidenav')
            </div>
            <div class="col-md-10">

                <div class="card">
                    <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Content</th>
                    <th scope="col">Name</th>
                    <th scope="col">Profession</th>
                    <th scope="col">Video_id</th>
                    <th scope="col">Created at</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial )
                    <tr>
                        <td>{{str_limit($testimonial->content,20)}}</td>
                        <td>{{$testimonial->name}}</td>
                        <td>{{$testimonial->profession}}</td>
                        <td>{{$testimonial->video_id}}</td>
                        <td>{{$testimonial->created_at->diffForHumans()}}</td>


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
            {{$testimonials->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection
