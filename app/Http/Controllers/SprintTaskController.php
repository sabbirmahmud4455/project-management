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
        $request->validate([
            'tasks' => 'required'
        ]);
        foreach ($request->tasks as $key => $task) {
            $sprintTask = SprintTask::create([
                'sprint_id' => $request->spritnID,
                'priority' => $request->priority,
                'assigned_to' => $request->asigneTo,
                'task_id' => $task,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SprintTask  $sprintTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(SprintTask $sprintTask)
    {
        //
    }
}
