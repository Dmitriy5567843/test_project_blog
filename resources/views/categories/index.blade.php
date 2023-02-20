@extends('layouts.app')

@section('content')

    @if(!Auth::guest() && Auth::user()->role === 'admin')
    <div class="d-flex justify-content-center" style="margin-bottom: 100px">
        <form method="POST" action="{{route('categories.create')}}" style="width:300px">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Create new category</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name..">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endif

    <div class="d-flex justify-content-around align-content-stretch flex-wrap">
    @foreach($categories as $category)
    <div class="card text-center mx-auto mb-2" style="width: 400px;">
        <div class="card-header">
            Category
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <input type="text" style="text-align: center" readonly class="form-control-plaintext" id="staticEmail" value="{{$category->name}}">
            </div>
        </div>
        <div class="d-flex m-1 justify-content-end card-footer text-muted">
            @if(!Auth::guest() && Auth::user()->role === 'admin')

            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary" style="margin-right: 5px">Edit</a>

            {{Form::open(['route' => ['categories.delete', $category->id], 'method' => 'delete'])}}
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
