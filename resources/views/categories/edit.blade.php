@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center" style="margin-top: 200px">
    <form method="POST" action="{{route('categories.update', $category->id)}}" style="width:300px">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
