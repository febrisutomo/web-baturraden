<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::latest()->limit(4)->get();
        $data['places'] = Place::all();
        return view('admin/index', $data);
    }
}
