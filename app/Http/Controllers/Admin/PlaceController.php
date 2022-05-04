<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest()->get();
        return view('admin/place/index', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/place/create');
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
            'name' => 'required|string|max:50',
            'photo' => 'required|image|file|max:2048',
            'detail' => 'required|string|max:1500'
        ]);

        $slug = Str::slug($request->name);
        $slug_count = Place::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug .= '-' . $slug_count;
        }

        $image =  $request->file('photo');


        if ($image) {
            $fileName = uniqid() . '.' . $image->extension();
            $image->move(public_path('img/place'), $fileName);
            $photoUri = 'img/place/' . $fileName;
        }


        Place::create([
            'slug' => $slug,
            'name' => $request->name,
            'photo' => $photoUri,
            'detail' => $request->detail,
        ]);

        return redirect()->route('place.index')->with('success', 'Destinasi Wisata berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('admin/place/edit', ['place' => $place]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'photo' => 'image|file|max:2048',
            'detail' => 'required|string|max:1000'
        ]);


        $slug = Str::slug($request->name);
        $slug_count = Place::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug .= '-' . Str::random(3);
        }

        $image =  $request->file('photo');


        if ($image) {
            $fileName = uniqid() . '.' . $image->extension();
            $image->move(public_path('img/place'), $fileName);
            $photoUri = 'img/place/' . $fileName;
            if (File::exists($place->photo)) {
                File::delete($place->photo);
            }
        } else {
            $photoUri = $place->photo;
        }

        if ($request->name == $place->name) {
            $place->update([
                'name' => $request->name,
                'photo' => $photoUri,
                'detail' => $request->detail,
            ]);
        } else {
            $place->update([
                'slug' => $slug,
                'name' => $request->name,
                'photo' => $photoUri,
                'detail' => $request->detail,
            ]);
        }

        return redirect()->route('place.index')->with('success', 'Destinasi Wisata berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();
        if (File::exists($place->photo)) {
            File::delete($place->photo);
        }
        return back()->with('success', 'Destinasi wisata berhasil dihapus!');
    }
}
