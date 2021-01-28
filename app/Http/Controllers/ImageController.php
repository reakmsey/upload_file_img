<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the myformPost.
     *
     * @return \Illuminate\Http\Response

     */
    public function multipleImage()
    {
        return view('multipleImage.imageUpload');
    }
    /**
     * Display a listing of the myformPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function multipleImageStore(Request $request)
    {
        foreach($request->file('file') as $image)
        {
            $imageName=$image->getClientOriginalName();
            $image->move(storage_path().'/images/', $imageName);
            $fileNames[] = $imageName;
        }
        $images = json_encode($fileNames);
        // Store $images image in DATABASE from HERE
        Image::create(['images' => $images]);
        return back()
            ->with('success','You have successfully file uplaod.')
            ->with('files',$fileNames);
    }
}
