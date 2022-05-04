<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::paginate(6);

        return view('destination', ['places' => $places]);
    }

}
