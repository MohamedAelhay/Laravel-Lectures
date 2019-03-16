<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
//        return PostResource::collection(Post::all());
        return PostResource::collection(Post::paginate(3));
    }

    public function show(Post $post)
    {
//        dd($post);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
        return response()->json([
            'message' => 'Post Created'
        ], 201);
    }
}