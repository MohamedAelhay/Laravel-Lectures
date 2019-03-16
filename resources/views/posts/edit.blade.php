@extends('layouts.app')

@section('content')

    <a href="{{route('posts.index')}}" class="btn btn-success">BACK</a>

    <h1>Edit Post</h1>

    <form action="{{route('posts.update', ['post' => $post->id])}}" method="post">
        @csrf
        @method("put")

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Title</span>
            </div>
            <input type="text" class="form-control" value="{{$post->title}}" name="title" placeholder="Title" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
            </div>
            <textarea class="form-control" name="description" aria-label="With textarea">{{$post->description}}</textarea>
        </div>
        <br>
        <select class="custom-select custom-select-sm" name="user_id">
                <option value="{{$post->user->id}}">{{@$post->user->name}}</option>
        </select>
        <br>
        <br>
        <input type="submit" class="btn btn-success">
    </form>

@endsection