<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Session\Store;

class PostsController extends Controller
{
    public function index()
    {

//        $posts = Post::all();
//        $posts = Post::simplePaginate(2);
        return view('posts.index', [
            'posts' => Post::with('user')->paginate(2)
//            'posts' => $posts
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }


    public function store(StorePostRequest $request)
    {
//        $request->validate([
//            'title' => 'required|min:3',
//            'description' => 'required'
//        ], [
//            'title.required' => 'ay 7aga',
//            'title.min' => "akter mn 3 ya 3'aby",
//        ]);

//        $request = request();
//        $data = $request->all();
//        dd($data);

//        Post::create([
//            'title' => $data['title'],
//            'description' => $data['description']
//        ]);
//        dd(request()->file('img')->store('public/posts'));
//        dd(Storage::putFile('', $request->file('img')));
//        $path = Storage::disk('public')->putFile('posts', $request->file('img'));
        $path = Storage::putFile('public/posts', $request->file('img'));
//        $path = request()->file('img')->store('public/posts');
//        dd($path);
        Post::create($request->only(['title', 'description', 'user_id']) + ["img" => $path]);
//        Post::create(['title' => $request->post("title"),
//            'description' => $request->post("description"),
//            'user_id' => $request->post("user_id"),
//            "img" => $path]);
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
//      $post = Post::where('id', $post)->get()->first();
//      $post = Post::where('id', $post)->first();
//        $post = Post::find($post);
//        $post = Post::findOrFail($post);
//        dd($post);
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
//        Post::findOrFail($post)->update(request()->all());
//        Post::updateOrCreate(request()->except(['_token','_method']));
//        dd(request()->all());

        Post::find($post->id)->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
//        Post::findOrFail($post)->update(request()->all());
//        Post::updateOrCreate(request()->except(['_token','_method']));
//        dd(Post::find($post->id));
        Post::destroy($post->id);
        return redirect()->route('posts.index');
    }
}
