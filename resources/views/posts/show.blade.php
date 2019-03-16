@extends('layouts.app')
@section('content')
    <h1>{{$post->title}}</h1>

    <h5>Post Info</h5>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->human_readable_date()}}</td>
        </tr>
        </tbody>
    </table>

    <h5>Post Creator Info</h5>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Created At</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{isset($post->user->name) ? $post->user->name : "No Name"}}</td>
            <td>{{isset($post->user->email) ? $post->user->email : "No Mail"}}</td>
            <td>{{isset($post->user->created_at) ? $post->user->created_at : "Not Reg."}}</td>
        </tr>
        </tbody>
    </table>
    <a href="{{route('posts.index')}}" class="btn btn-success">Back</a>
@endsection