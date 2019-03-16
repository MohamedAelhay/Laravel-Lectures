@extends('layouts.app')
@section('content')
    <h1>Hello Laravel</h1>
    {{--{{$posts[1]->title()}}--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Image</th>
            <th scope="col" colspan="3"><center>Options</center></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{isset($post->user) ? $post->user->name : "Not Found"}}</td>
                <td>{{isset($post->created_at) ? $post->created_at->format("Y-m-d") : "Not Reg."}}</td>
                <td><img src="{{ Storage::url($post->img)}}"
                         alt="No Image" class="img-thumbnail" height="50px" width="100px"></td>
                <td><a href="{{route('posts.show', ['post' => $post])}}" class="btn btn-primary">VIEW</a></td>
                <td><a href="{{route('posts.edit', ['post' => $post])}}" class="btn btn-secondary">EDIT</a></td>
                <td>
                    <form action="{{route('posts.destroy', ['post' => $post])}}" method="post">
                        @csrf
                        @method("delete")
                        <input type="submit" value="DELETE" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}

    <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
@endsection