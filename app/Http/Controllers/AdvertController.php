<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdvertController extends Controller
{

    function isBase64($data)
    {
        if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function index()
    {
        return response()->json(Advert::get());
    }

    public function create(Request $request)
    {
        try {
            $arr = [];
            $this->validate($request, [
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);

            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $image) {
                    if ($image->isValid()) {
                        try {
                            if ($image !== $this->isBase64($image)) {
                                $image = base64_encode($image);
                            }
                            $response = Http::post('https://api.cloudinary.com/v1_1/young-development-initiative/image/upload', [
                                'file' => $image,
                                'upload_preset' => "mesotej3",
                                'folder' => "eskimi",
                            ]);
                            array_push($arr, $response->secure_url);
                        } catch (FileNotFoundException $e) {
                            return $e;
                        }
                    }
                }
            }

            $request->image = json_encode($arr);
            $advert = Advert::create($request->all());
            return response()->json($advert);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function seedDB()
    {
        Advert::factory()->count(3)->create();
        return response()->json(Advert::get());
    }
}
