<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Advert::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $advert = Advert::create($request->all());
        return response()->json($advert);
    }

    public function seedDB()
    {
        Advert::factory()->count(3)->create();
        return response()->json(Advert::get());
    }
}
