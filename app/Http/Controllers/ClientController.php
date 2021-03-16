<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients= Client::orderBy('id', 'desc')->paginate(10);
        return response()->json($clients);
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
            'email'=>'email|unique:clients,email|nullable',
            'gender'=>'required',
            'photo'=>'image|nullable',
            'contact_no'=>'numeric|nullable',
            'emergency_contact_person'=>'numeric|nullable',
        ]);

        if ($request->photo==null) {
            if ($request->gender=='Male') {
                $image_path='/images/users/default/avatar1.png';
            } else {
                $image_path='/images/users/default/avatar2.png';
            }
            
        } else {
            $imageName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/clients'), $imageName);
            $image_path= '/images/clients/'.$imageName;
        }
        if ($request->details=='<h4 class="text-muted">Client Details</h4>') {
            $details= '';
        }else{
            $details= $request->details;
        }
        Client::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'emergency_contact_person'=>$request->emergency_contact_person,
            'photo'=>$image_path,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'details'=>$details,
            'created_at'=>Carbon::now(),
        ]);
        return response()->json('Client Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'email|nullable|unique:clients,email,'.$client->id,
            'gender'=>'required',
            'photo'=>'image|nullable',
            'contact_no'=>'numeric|nullable',
            'emergency_contact_person'=>'numeric|nullable',
        ]);
        if ($request->details=='<h4 class="text-muted">Client Details</h4>') {
            $details= '';
        }else{
            $details= $request->details;
        }
       
        $client->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'emergency_contact_person'=>$request->emergency_contact_person,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'details'=>$details,
            'updated_at'=>Carbon::now(),
        ]);

        return response()->json('Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if ($client) {
            $client->delete();
            return response()->json('Delete Successfully');
        }
    }

    public function image_update(Request $request, Client $client)
    {
        $request->validate([
            "photo"=>"image"
        ]);
        if ($request->photo) {
            $imageName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/clients'), $imageName);
            $image_path= '/images/clients/'.$imageName;
            if (!$client->photo =='/images/clients/default/avatar1.png' || !$client->photo=='/images/clients/default/avatar2.png') {
                if (File::exists($client->image)) {
                    File::delete($client->image);
                    //unlink($image_path);
                }
            }
            $client->update([
                'photo'=>$image_path
            ]);
        }
        return response()->json('image update successfully');
    }

    public function all_clients()
    {
        $clients= Client::orderBy('id', 'desc')->get();
        return response()->json($clients);
    }

   
}
