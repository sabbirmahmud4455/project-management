<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects= Project::orderBy('id', 'desc')->paginate(10);
        return response()->json($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'photo'=>'image|nullable'
        ]);
        if ($request->photo==null) {
            $image_path='/images/projects/default/project_default.jpg';
        } else {
            $imageName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/projects'), $imageName);
            $image_path= '/images/projects/'.$imageName;
        }
        
        Project::insert([
            'name'=>$request->name,
            'client_id'=>$request->client_id,
            'type'=>$request->type,
            'photo'=>$image_path,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'development_cost'=>$request->development_cost,
            'status'=>'Pending',
            'created_at'=>Carbon::now(),
        ]);
        return response()->json('Project Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return response()->json($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name'=>'required',
            'photo'=>'image|nullable'
        ]);
        
        $project->update([
            'name'=>$request->name,
            'client_id'=>$request->client_id,
            'type'=>$request->type,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'development_cost'=>$request->development_cost,
            'status'=>'Pending',
            'updated_at'=>Carbon::now(),
        ]);
        return response()->json('Project Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project) {
            $project->delete();
            return response()->json('Delete Successfully');
        }
    }
    public function client_pending_project($id)
    {
        $project= Project::where('client_id', $id)->where('status', 'Pending')->orderBy('id', 'desc')->paginate(10);
        return response()->json($project);
    }
    public function client_active_project($id)
    {
        $project= Project::where('client_id', $id)->where('status', 'Active')->orderBy('id', 'desc')->paginate(10);
        return response()->json($project);
    }
    public function client_complete_project($id)
    {
        $project= Project::where('client_id', $id)->where('status', 'Complete')->orderBy('id', 'desc')->paginate(10);
        return response()->json($project);
    }
}
