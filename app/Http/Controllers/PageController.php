<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request) {
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$search}%")->latest()->paginate();
        $posts->withPath("?search=$search");
        return view('home', ['posts' => $posts]);
    }

    public function post(Post $post) {
        return view('post', ['post' => $post]);
    }
}
