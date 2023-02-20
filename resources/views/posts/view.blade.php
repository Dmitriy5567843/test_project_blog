@extends('layouts.app')

@section('content')

    <div class="card text-center mx-auto" style="width: 600px;">
        <div class="card-header">
            Post By {{$post->user->name}}
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$post->title}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    {{$post->content}}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Categories</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$post->category->name}}">
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            &@if(!Auth::guest() && Auth::user()->role === 'admin')
         <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a>
    <a href="{{route('users.delete', $user->id)}}" class="btn btn-danger" data-method="delete">Delete</a>
            @endif
        </div>
    </div>

@endsection
