<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::orderBy('id', 'desc')->paginate(10);
        return response()->json($users);
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
            'email'=>'required|email|unique:users,email',
            'user_type'=>'required|numeric',
            'gender'=>'required',
            'photo'=>'image|nullable',
            'password' => 'required|confirmed|min:6',
        ]);
        if($request->user_type==1){
            $user_type= 'Admin';
        }else{
            $user_type= 'Member';
        }

        if ($request->photo==null) {
            if ($request->gender=='Male') {
                $image_path='/images/users/default/avatar1.png';
            } else {
                $image_path='/images/users/default/avatar2.png';
            }
            
        } else {
            $imageName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/users'), $imageName);
            $image_path= '/images/users/'.$imageName;
        }

        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'type_id'=>$request->user_type,
            'type'=>$user_type,
            'gender'=>$request->gender,
            'photo'=>$image_path,
            'password'=> Hash::make($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return response()->json($request->photo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'user_type'=>'required|numeric',
            'gender'=>'required',
        ]);

        if ($request->pass_change=="On") {
            $request->validate([
                'old_password'=>'required',
                'password' => 'required|confirmed|min:6'
            ]);
            if (Hash::check('$request->old_password', $user->password)) {
                $user->update([
                'password'=> Hash::make($request->password),
                ]);
            }
            return response()->json(['old_password' => 'Old Password Not Match'], 422);
        }

        if($request->user_type==1){
            $user_type= 'Admin';
        }else{
            $user_type= 'Member';
        }
        
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'type_id'=>$request->user_type,
            'type'=>$user_type,
            'gender'=>$request->gender,
            'updated_at'=>Carbon::now(),
        ]);

        return response()->json('Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            return response()->json('Delete Successfully');
        }
    }
}
