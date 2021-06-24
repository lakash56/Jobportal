@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Menu
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <form action="">
                            @csrf
                            <div class="from-group">
                                <label>Title</label>

                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="from-group">
                                <label>Content</label>
                                <input type="text" name="content" class="form-control">
                            </div>
                            <div class="from-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="from-group">
                                <label>status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Live</option>
                                    <option value="0">Draft</option>
                                </select>
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
