@extends('layouts.app')

@section('content')

    <a href="{{route('posts.index')}}" class="btn btn-primary">BACK</a>

    <h1>Add New Post</h1>

    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf

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
            <input type="text" class="form-control" name="title" placeholder="Title" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
            </div>
            <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
        </div>
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="img">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <br>
        <select class="custom-select custom-select-sm" name="user_id">
            <option>Select User</option>
        @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <br>
        <br>
        <input type="submit" class="btn btn-success">
    </form>

@endsection
