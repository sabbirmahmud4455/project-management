<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use App\Models\SprintTask;
use Carbon\Carbon;
use App\Models\Task;
use App\Models\TaskImage;
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
        $tasks = Task::with(["project", "module"])->orderBy('id', 'desc')->get();
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
            'name' => 'required',
            'project_id' => 'required|integer',
            'module_id' => 'integer',
        ]);
        if ($request->description == '<h4 class="text-muted">Client Details</h4>') {
            $description = '';
        } else {
            $description = $request->description;
        }

        $task = Task::create([
            'name' => $request->name,
            'project_id' => $request->project_id,
            'module_id' => $request->module_id,
            'type' => $request->type,
            'description' => $description,
            'status' => $request->status,
        ]);
        if ($request->images) {
            foreach ($request->images as $image) {
                TaskImage::create([
                    "task_id" => $task->id,
                    "image" => $image,
                ]);
            }
        }

        if ($request->module_id) {
            Module::where('id', $request->module_id)->update([
                "status" => "Active"
            ]);
        }



        if ($request->project_id) {
            Project::where('id', $request->project_id)->update([
                "status" => "Active"
            ]);
        }



        if ($request->sprint_id) {
            $sprint_task = SprintTask::create([
                'sprint_id' => $request->sprint_id,
                'task_id' => $task->id,
                'assign_to' => $request->assign_to,
                'priority' => $request->priority,
                'status' => 'New'
            ]);
        }

        return response()->json('Task Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task = Task::where('id', $task->id)->with(['project', 'module'])->get();
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
        $task = Task::where('id', $task->id)->with(['module'])->first();
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
        $request->validate([
            'name' => 'required',
        ]);
        if ($request->description == '<h4 class="text-muted">Client Details</h4>') {
            $description = '';
        } else {
            $description = $request->description;
        }
        $task->update([
            'name' => $request->name,
            'project_id' => $request->project_id,
            'module_id' => $request->module_id,
            'type' => $request->type,
            'description' => $description,
            'status' => $request->status,

        ]);

        return response()->json($request);
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

    public function get_all_task()
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return response()->json($tasks);
    }



    public function user_active_task($id)
    {
        $task = Task::where('assign_to', $id)->where('status', 'Active')->orderBy('id', 'desc')->paginate(10);
        return response()->json($task);
    }
    public function user_complete_task($id)
    {
        $task = Task::where('assign_to', $id)->where('status', 'Complete')->orderBy('id', 'desc')->paginate(10);
        return response()->json($task);
    }

    public function project_task_pagination($id)
    {
        $tasks = Task::where('project_id', $id)->orderBy('id', 'desc')->paginate(10);
        return response()->json($tasks);
    }

    public function project_task($id)
    {
        $tasks = Task::where('project_id', $id)->orderBy('id', 'desc')->get();
        return response()->json($tasks);
    }

    public function module_tasks($id)
    {
        $tasks = Task::where('module_id', $id)->orderBy('id', 'desc')->paginate(4);
        return response()->json($tasks);
    }
    public function Wmodule_tasks($id)
    {
        $tasks = Task::where('module_id', $id)->orderBy('id', 'desc')->get();
        return response()->json($tasks);
    }
    public function independent_tasks()
    {
        $tasks = Task::where('project_id', 0)->where('module_id', 0)->orderBy('id', 'desc')->get();
        return response()->json($tasks);
    }
}
