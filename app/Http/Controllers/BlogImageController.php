<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogImageController extends Controller
{
    public function storeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required|image|max:5120|mimes:jpeg,png,jpg',
        ])->validate();
        // 8192

        // if ($validator->fails()) {
        //     return response()->json(['uploaded'=> 0]);
        // }
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('upload')->move(public_path('blog'), $fileName);

        $url = asset('blog/' . $fileName);
        return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
    }
}
