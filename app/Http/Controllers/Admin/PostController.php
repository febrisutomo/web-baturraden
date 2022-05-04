<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin/post/index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'thumbnail' => 'required|image|file|max:2048',
            'content' => 'required|string'
        ]);

        $slug = Str::slug($request->title);
        $slug_count = Post::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug .= '-' . $slug_count;
        }

        $thumbnail =  $request->file('thumbnail');


        if ($thumbnail) {
            $fileName = uniqid() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('img/post'), $fileName);
            $thumbnailUri = 'img/post/' . $fileName;
        }


        Post::create([
            'slug' => $slug,
            'title' => $request->title,
            'thumbnail' => $thumbnailUri,
            'content' => $request->content,
        ]);

        return redirect()->route('post.index')->with('success', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin/post/edit', ['post' => $post]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'thumbnail' => 'image|file|max:2048',
            'content' => 'required|string'
        ]);


        $slug = Str::slug($request->title);
        $slug_count = Post::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug .= '-' . Str::random(3);
        }

        $thumbnail =  $request->file('thumbnail');


        if ($thumbnail) {
            $fileName = uniqid() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('img/post'), $fileName);
            $thumbnailUri = 'img/post/' . $fileName;
            if (File::exists($post->thumbnail)) {
                File::delete($post->thumbnail);
            }
        } else {
            $thumbnailUri = $post->thumbnail;
        }

        if ($request->title == $post->title) {
            $post->update([
                'title' => $request->title,
                'thumbnail' => $thumbnailUri,
                'content' => $request->content,
            ]);
        } else {
            $post->update([
                'slug' => $slug,
                'title' => $request->title,
                'thumbnail' => $thumbnailUri,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('post.index')->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        if (File::exists($post->thumbnail)) {
            File::delete($post->thumbnail);
        }
        return back()->with('success', 'Postingan berhasil dihapus!');
    }
}
