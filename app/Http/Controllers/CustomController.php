<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Project_descriptions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

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

    public function edit_project_desc($id)
    {
        $project_desc= Project_descriptions::where('project_id', $id)->get();
        return response()->json($project_desc);
    }

    public function create_project_desc(Request $request, $id)
    {
        $request->validate([
            'document_file'=>"file|mimes:zip|nullable"
        ]);
        
        if ($request->document_file) {
            $file_name = time() . '_' . uniqid() . '.' . $request->document_file->getClientOriginalExtension();
            $request->document_file->move(public_path('documentation/projects'), $file_name);
            $file_path= '/documentation/projects'.$file_name;
        }
        
        Project_descriptions::insert([
            'project_id'=>$id,
            'document_path'=>$file_path,
            'description'=>$request->description,
            'documentation'=>$request->documentation,
            
            'created_at'=>Carbon::now(),
        ]);
        return response()->json('Project Desc Create successfully');
    }
    public function update_project_desc(Request $request, $id)
    {
        $request->validate([
            'document_file'=>"file|mimes:zip|nullable"
        ]);
        $project_desc= Project_descriptions::where('project_id', $id);

        if ($request->document_file) {
            $file_name = time() . '_' . uniqid() . '.' . $request->document_file->getClientOriginalExtension();
            $request->document_file->move(public_path('documentation/projects'), $file_name);
            $file_path= '/documentation/projects/'.$file_name;
        }
        
        $project_desc->update([
            'document_path'=>$file_path,
            'description'=>$request->description,
            'documentation'=>$request->documentation,
            
            'created_at'=>Carbon::now(),
        ]);
        return response()->json('Project Desc Create successfully');
    }

    public function download($id)
    {
        $project_desc= Project_descriptions::where('project_id', $id)->first();
       
        $file=public_path($project_desc->document_path);
        
        return Response::download($file, 'documentation.zip');

    }
}
