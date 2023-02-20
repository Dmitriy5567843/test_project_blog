@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center" style="margin-bottom: 100px">
        <form method="POST" action="{{ route('posts.create') }}" style="width:300px">
            @csrf
            <div class="form-group">
                <label for="category">Выберите категорию:</label>
                <select class="form-control" id="category" name="category_id">
                    <option value="">Выберите категорию</option>
                    @foreach($list as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="text-area">Введите текст:</label>
                <textarea class="form-control" id="content" name="content" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
    <div class="d-flex justify-content-around align-content-stretch flex-wrap">
        @foreach($posts as $post)
            <div class="card text-center mx-auto mb-2" style="width: 400px;">

                <div class="card-header">
                    Post by {{$post->user->name}}
                </div>
                <div class="card-body">
                    <div class="text-center mx-auto ">
                        <input type="text" style="text-align: center" readonly class="form-control-plaintext"
                               id="staticEmail" value="{{$post->title}}">
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center mx-auto ">
                        {{$post->content}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center mx-auto mb-2">
                        <label for="staticEmail" class="col-sm-2 col-form-label" style="width: 100px">Category</label>
                        <input type="text" style="text-align: center" readonly class="form-control-plaintext"
                               id="staticEmail" value="{{$post->category->name}}">
                    </div>
                </div>
                <div class="d-flex m-1 justify-content-end card-footer text-muted">
                    <a href="{{route('posts.view', $post->id)}}" class="btn btn-primary"
                       style="margin-right: 5px">View</a>

                    @if((!Auth::guest() && Auth::user()->role === 'user'
                        && Auth::user()->id===$post->user->id)
                        || !Auth::guest() && Auth::user()->role === 'admin')

                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary" style="margin-right: 5px">Edit</a>

                        {{Form::open(['route' => ['posts.delete', $post->id], 'method' => 'delete'])}}
                        <button type="submit" onclick="confirm('are you sure?')" class="btn btn-danger">
                            Delete
                        </button>
                        {{Form::close()}}
                    @endif

                </div>
            </div>
        @endforeach
    </div>
@endsection
