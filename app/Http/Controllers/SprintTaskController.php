<?php

namespace App\Http\Controllers;

use App\Models\SprintTask;
use Illuminate\Http\Request;

class SprintTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        foreach ($request->selectedTask as $key => $task) {


            $sprintTask = SprintTask::create([
                'sprint_id' => $task['sprintID'],
                'priority' =>  $task['priority'],
                'status'=>'New',
                'assigned_to' =>  $task['asigneTo'],
                'task_id' => $task['taskId'],
            ]);
        }
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SprintTask  $sprintTask
     * @return \Illuminate\Http\Response
     */
    public function show(SprintTask $sprintTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SprintTask  $sprintTask
     * @return \Illuminate\Http\Response
     */
    public function edit(SprintTask $sprintTask)
    {
        return response()->json($sprintTask);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SprintTask  $sprintTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SprintTask $sprintTask)
    {
        $sprintTask->update([
            'priority'=>$request->priority,
            'assigned_to'=>$request->assigned_to,
            'status'=>$request->status,
        ]);
        return response()->json('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SprintTask  $sprintTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(SprintTask $sprintTask)
    {
        $sprintTask->delete();
        return response()->json('deleted Successfully');
    }
}
