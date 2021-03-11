<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks= Task::with(["project", "module"])->orderBy('id', 'desc')->paginate(10);
        return response()->json($tasks);
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
            'project_id'=>'integer',
            'module_id'=>'integer',
            'assign_to'=>'integer',
        ]);
        if ($request->description=='<h4 class="text-muted">Client Details</h4>') {
            $description= '';
        }else{
            $description= $request->description;
        }

        Task::insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'project_id'=>$request->project_id,
            'module_id'=>$request->module_id,
            'assign_to'=>$request->assign_to,
            'description'=>$description,
            'status'=>'Active',
            'created_at'=>Carbon::now(),
        ]);
        if ($request->module_id) {
            Module::where('id', $request->module_id)->update([
                "status"=> "Active"
            ]);
        }
        


        if ($request->project_id) {
            Project::where('id', $request->project_id)->update([
                "status"=> "Active"
            ]);
        }
        
        return response()->json('Module Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if ($task) {
            $task->delete();
            return response()->json('Delete Successfully');
        }
    }
}
