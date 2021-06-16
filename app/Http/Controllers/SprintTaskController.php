<?php

namespace App\Http\Controllers;

use App\Models\SprintTask;
use App\Models\Task;
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

            $sprintTask = SprintTask::updateOrCreate([
                'sprint_id' => $task['sprint_id'],
                'task_id' => $task['task_id'],
            ], [

                'priority' =>  $task['priority'],
                'status' => 'New',
                'assign_to' =>  $task['assign_to'],
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
        $sprint_task = SprintTask::with(['task'])->find($sprintTask->id);
        return response()->json($sprint_task);
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
        $task = Task::find($sprintTask->task_id);


        $sprintTask->update([
            'priority' => $request->priority,
            'assign_to' => $request->assign_to,
            'status' => $request->status,
        ]);

        $task->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
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
