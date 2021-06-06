<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class ImageController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$imageName = rand(100,999).time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('images'), $imageName);
         
    	return response()->json(['imageName'=>$imageName]);
    }
}