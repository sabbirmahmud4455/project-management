<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
use App\Models\UserType;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['types', 'roles'])->orderBy('id', 'desc')->get();
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'user_type' => 'required|numeric',
            'gender' => 'required',
            'photo' => 'image|nullable',
            'password' => 'required|confirmed|min:6',
        ]);


        if ($request->photo == null) {
            if ($request->gender == 'Male') {
                $image_path = '/images/users/default/avatar1.png';
            } else {
                $image_path = '/images/users/default/avatar2.png';
            }
        } else {
            $imageName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/users'), $imageName);
            $image_path = '/images/users/' . $imageName;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            // 'type_id' => $request->user_type,
            // 'type' => $user_type,
            'gender' => $request->gender,
            'photo' => $image_path,
            'password' => Hash::make($request->password),
        ]);

        if ($request->types) {
            foreach ($request->types as $key => $type) {

                $user_type = UserType::create([
                    'user_id' => $user->id,
                    'name' => $type['name']
                ]);
            }
        }
        if ($request->roles) {
            foreach ($request->roles as $key => $role) {
                $role_name = strval($role['name']);
                $user_role = UserRole::create([

                    'user_id' => $user->id,
                    'name' => $role_name
                ]);
            }
        }



        return response()->json('User Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user_pro = User::where('id', $user->id)->with(['profile'])->get();
        return response()->json($user_pro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user_pro = User::where('id', $user->id)->with(['types', 'roles'])->get();
        return response()->json($user_pro);
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'gender' => 'required',
        ]);

        if ($request->pass_change == "On") {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed|min:6'
            ]);
            if (Hash::check('$request->old_password', $user->password)) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            return response()->json(['old_password' => 'Old Password Not Match'], 422);
        }

        if ($request->user_type == 1) {
            $user_type = 'Admin';
        } else {
            $user_type = 'Member';
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,

            'gender' => $request->gender,
            'updated_at' => Carbon::now(),
        ]);

        $user_type =  UserType::where('user_id', $user->id);
        $user_type->delete();
        if ($request->types) {

            foreach ($request->types as $key => $type) {

                $user_type = UserType::create([
                    'user_id' => $user->id,
                    'name' => $type['name']
                ]);
            }
        }
        $user_role =  UserRole::where('user_id', $user->id);
        $user_role->delete();
        if ($request->roles) {
            foreach ($request->roles as $key => $role) {
                $role_name = strval($role['name']);
                $user_role = UserRole::create([

                    'user_id' => $user->id,
                    'name' => $role_name
                ]);
            }
        }

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

    public function image_update(Request $request, User $user)
    {
        $request->validate([
            "photo" => "image"
        ]);

        if ($request->photo) {
            $imageName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/users'), $imageName);
            $image_path = '/images/users/' . $imageName;
            if (!$user->photo == '/images/users/default/avatar1.png' || !$user->photo == '/images/users/default/avatar2.png') {
                if (File::exists($user->image)) {
                    File::delete($user->image);
                    //unlink($image_path);
                }
            }
            $user->update([
                'photo' => $image_path
            ]);
        }
        return response()->json('image update successfully');
    }

    public function get_all_users()
    {
        $users = User::orderBy('id', 'desc')->get();
        return response()->json($users);
    }

        /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $success = true;
            $message = 'User login successfully';
            return [
                "user"=>Auth::user(),
                "success"=>true,
                "token"=>Auth::user()->createToken('MyApp')->plainTextToken
            ];
        } else {
            $success = false;
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * Logout
     */
    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
