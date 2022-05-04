<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);

        return view('blog', ['posts' => $posts]);
    }

    public function single(Post $post)
    {
        return view('blog-single', ['post' => $post]);
    }
}
