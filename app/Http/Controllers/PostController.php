<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function dataPost()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('data-post', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('tambah-post');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit-post', [
            'postingan' => $post
        ]);
    }

    public function store(Request $request)
    {
        Post::create($request->all());

        return redirect('/posts');
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('detail-postingan', [
            'post' => $post
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect('/posts');
    }
}
