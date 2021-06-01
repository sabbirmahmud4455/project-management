<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules= Module::with(["project"])->orderBy('id', 'desc')->paginate(10);
        return response()->json($modules);
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
            'project_id'=>'integer'
        ]);
        if ($request->description=='<h4 class="text-muted">Client Details</h4>') {
            $description= '';
        }else{
            $description= $request->description;
        }

        Module::insert([
            'name'=>$request->name,
            'project_id'=>$request->project_id,
            'description'=>$description,
            'status'=>'Pending',
            'created_at'=>Carbon::now(),
        ]);
        return response()->json('Module Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        $get_module= Module::where('id', $module->id)->with(['project'])->get();
        return response()->json($get_module);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return response()->json($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name'=>'required',
            'project_id'=>'integer'
        ]);
        if ($request->description=='<h4 class="text-muted">Client Details</h4>') {
            $description= '';
        }else{
            $description= $request->description;
        }

        $module->update([
            'name'=>$request->name,
            'project_id'=>$request->project_id,
            'description'=>$description,
            'status'=>'Pending',
            'updated_at'=>Carbon::now(),
        ]);
        return response()->json('Module Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        if ($module) {
            $module->delete();
            return response()->json('Delete Successfully');
        }
    }

    public function project_modules_pag($id)
    {
        $module= Module::where('project_id', $id)->orderBy('id', 'desc')->paginate(10);
        return response()->json($module);
    }

    public function project_modules($id)
    {
        $projects= Module::orderBy('id', 'desc')->where('project_id', $id)->get();
        return response()->json($projects);
    }
    
}
