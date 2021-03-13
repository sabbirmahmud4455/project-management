<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Profile;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function edit_profile($id)
    {
        $profile=Profile::where('user_id', $id)->get();
        return response()->json($profile);
    }
    public function create_profile(Request $request ,$id)
    {
        $request->validate([
            'date_of_birth'=>'date|nullable',
            'nid'=>'numeric|nullable',
        ]);
        
        Profile::insert([
            'user_id'=>$id,
            'date_of_birth'=>$request->date_of_birth,
            'nid'=>$request->nid,
            'bio'=>$request->bio,
            'skills'=>$request->skills,
            'present_address'=>$request->present_address,
            'permanent_address'=>$request->permanent_address,
            'emergency_contact_person'=>$request->emergency_contact_person,
            'created_at'=>Carbon::now(),
        ]);

        return response()->json('Create Successfully');
    }
    public function update_profile(Request $request ,$id)
    {

        $request->validate([
            'date_of_birth'=>'date|nullable',
            'nid'=>'numeric|nullable',
        ]);
        Profile::where('user_id', $id)->update([
            'date_of_birth'=>$request->date_of_birth,
            'nid'=>$request->nid,
            'bio'=>$request->bio,
            'skills'=>$request->skills,
            'present_address'=>$request->present_address,
            'permanent_address'=>$request->permanent_address,
            'emergency_contact_person'=>$request->emergency_contact_person,
            'updated_at'=>Carbon::now(),
        ]);
        return response()->json('update Successfully');
        
        
    }
}
