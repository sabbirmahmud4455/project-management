<?php

namespace App\Http\Controllers;

use App\Models\app_info;
use Carbon\Carbon;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Project_descriptions;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class CustomController extends Controller
{
    public function edit_profile($id)
    {
        $profile = Profile::where('user_id', $id)->get();
        return response()->json($profile);
    }

    public function create_profile(Request $request, $id)
    {
        $request->validate([
            'date_of_birth' => 'date|nullable',
            'nid' => 'numeric|nullable',
        ]);

        Profile::insert([
            'user_id' => $id,
            'date_of_birth' => $request->date_of_birth,
            'nid' => $request->nid,
            'bio' => $request->bio,
            'skills' => $request->skills,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'emergency_contact_person' => $request->emergency_contact_person,
            'created_at' => Carbon::now(),
        ]);

        return response()->json('Create Successfully');
    }
    public function update_profile(Request $request, $id)
    {

        $request->validate([
            'date_of_birth' => 'date|nullable',
            'nid' => 'numeric|nullable',
        ]);
        Profile::where('user_id', $id)->update([
            'date_of_birth' => $request->date_of_birth,
            'nid' => $request->nid,
            'bio' => $request->bio,
            'skills' => $request->skills,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'emergency_contact_person' => $request->emergency_contact_person,
            'updated_at' => Carbon::now(),
        ]);
        return response()->json('update Successfully');
    }

    public function edit_project_desc($id)
    {
        $project_desc = Project_descriptions::where('project_id', $id)->get();
        return response()->json($project_desc);
    }

    public function create_project_desc(Request $request, $id)
    {
        $request->validate([
            'document_file' => "file|mimes:zip|nullable"
        ]);

        if ($request->document_file) {
            $file_name = time() . '_' . uniqid() . '.' . $request->document_file->getClientOriginalExtension();
            $request->document_file->move(public_path('documentation/projects'), $file_name);
            $file_path = '/documentation/projects' . $file_name;
        }

        Project_descriptions::insert([
            'project_id' => $id,
            'document_path' => $file_path,
            'description' => $request->description,
            'documentation' => $request->documentation,

            'created_at' => Carbon::now(),
        ]);
        return response()->json('Project Desc Create successfully');
    }
    public function update_project_desc(Request $request, $id)
    {
        $request->validate([
            'document_file' => "file|mimes:zip|nullable"
        ]);
        $project_desc = Project_descriptions::where('project_id', $id);

        if ($request->document_file) {
            $file_name = time() . '_' . uniqid() . '.' . $request->document_file->getClientOriginalExtension();
            $request->document_file->move(public_path('documentation/projects'), $file_name);
            $file_path = '/documentation/projects/' . $file_name;
        }

        $project_desc->update([
            'document_path' => $file_path,
            'description' => $request->description,
            'documentation' => $request->documentation,

            'created_at' => Carbon::now(),
        ]);
        return response()->json('Project Desc Create successfully');
    }

    public function download($id)
    {
        $project_desc = Project_descriptions::where('project_id', $id)->first();

        $file = public_path($project_desc->document_path);

        return Response::download($file, 'documentation.zip');
    }


    public function app_info()
    {
        $app_info = app_info::find(1);
        return response()->json($app_info);
    }

    public function app_info_update(Request $request)
    {
        $app_info = app_info::find(1);

        if ($request->logo) {
            $imageName = time() . 'logo' . uniqid() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('images/settings'), $imageName);
            $logo_path = '/images/settings/' . $imageName;



            $file_path = substr(strstr($app_info->logo, "/"), 1);

            if (File::exists($file_path)) {
                File::delete($file_path);
                //unlink($app_info->logo);
            }
        } else {
            if ($app_info->logo) {
                $logo_path = $app_info->logo;
            } else {
                $logo_path = null;
            }
        }

        if ($request->favicon) {
            $favicon_name = time() . 'fav' . uniqid() . '.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('images/settings'), $favicon_name);
            $favicon_path = '/images/settings/' . $favicon_name;



            $favicon_file_path = substr(strstr($app_info->favicon, "/"), 1);

            if (File::exists($favicon_file_path)) {
                File::delete($favicon_file_path);
                //unlink($app_info->logo);
            }
        } else {
            if ($app_info->logo) {
                $favicon_path = $app_info->favicon;
            } else {
                $favicon_path = null;
            }
        }

        $app_info->update([
            "name" => $request->app_name,
            "title" => $request->title,
            "subtitle" => $request->app_subtitle,
            "email" => $request->email,
            "address" => $request->address,
            "copy_right_text" => $request->copy_right_text,
            "details" => $request->details,
            "logo" => $logo_path,
            "favicon" => $favicon_path,
        ]);
    }
}
