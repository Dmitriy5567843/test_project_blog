@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center" style="margin-top: 200px">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" style="width:300px">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="3">{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
