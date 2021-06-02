<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sprints = Sprint::orderBy('id', 'desc')->paginate(10);
        return response()->json($sprints);
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
            'name' => 'required'
        ]);
        Sprint::insert([
            'name' => $request->name,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'duration' => $request->duration,
            'purposes' => $request->purposes,
            'description' => $request->description
        ]);
        return response()->json('Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int sprint_id
     * @return \Illuminate\Http\Response
     */
    public function show(int $sprint_id)
    {
        $sprint = Sprint::with(['sprintTask'])->whereId($sprint_id)->first();
        return response()->json($sprint);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function edit(Sprint $sprint)
    {
        return response()->json($sprint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sprint $sprint)
    {
        $sprint->update([
            'name' => $request->name,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'duration' => $request->duration,
            'purposes' => $request->purposes,
            'description' => $request->description
        ]);
        return response()->json('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sprint $sprint)
    {
        if ($sprint) {
            $sprint->delete();
            return response()->json('deleted');
        }
    }
}
