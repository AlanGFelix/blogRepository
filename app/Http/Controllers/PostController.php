<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', ['posts' => Post::latest()->paginate()]);
    }

    public function destroy(Post $post) {
        $post->delete();
        return back();
    }

    public function create(Post $post) {
        return view("posts.create", ["post" => $post]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required', Rule::unique('post', 'title')],
            'body' => 'required'
        ],[
            'title.required' => 'Este campo es requerido',
            'title.unique' => 'Este titulo ya existe',
            'body.required' => 'Este campo es requerido'
        ]);

        $post = $request->user()->posts()->create([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body
        ]);

        return redirect()->route('posts.edit', $post);
    }

    public function edit(Post $post) {
        return view('posts.edit', ["post" => $post]);
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => ['required', Rule::unique('post', 'title')->ignore($post->id)],
            'body' => 'required'
        ],[
            'title.required' => 'Este campo es requerido',
            'title.unique' => 'Este titulo ya existe',
            'body.required' => 'Este campo es requerido'
        ]);

        $post->update([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body
        ]);

        return redirect()->route('posts.edit', $post);
    }
}

