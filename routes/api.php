<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Module;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//user
Route::resource('/user', UserController::class);

Route::get('/users/admin', function () {
    $users= User::orderBy('id', 'desc')->where('type_id', 1)->paginate(10);
        return response()->json($users);
});
Route::get('/users/member', function () {
    $users= User::orderBy('id', 'desc')->where('type_id', 0)->paginate(10);
        return response()->json($users);
});

Route::get('/all_users', function () {
    $users= User::orderBy('id', 'desc')->get();
        return response()->json($users);
});

Route::post('/users/update/{user}', function (Request $request, User $user) {
    $request->validate([
        "photo"=>"image"
    ]);
    if ($request->photo) {
        $imageName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('images/users'), $imageName);
        $image_path= '/images/users/'.$imageName;
        if (!$user->photo =='/images/users/default/avatar1.png' || !$user->photo=='/images/users/default/avatar2.png') {
            if (File::exists($user->image)) {
                File::delete($user->image);
                //unlink($image_path);
            }
        }
        $user->update([
            'photo'=>$image_path
        ]);
    }
    return response()->json('image update successfully');
});
//user

//client
Route::resource('/client', ClientController::class);

Route::post('/clients/update/{client}', function (Request $request, Client $client) {
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
});
Route::get('/all_clients', function () {
    $clients= Client::orderBy('id', 'desc')->get();
    return response()->json($clients);
});

//client


//project
Route::resource('/project', ProjectController::class);

Route::post('/projects/update/{project}', function (Request $request, Project $project) {
    $request->validate([
        "photo"=>"image"
    ]);
    if ($request->photo) {
        $imageName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('images/projects'), $imageName);
        $image_path= '/images/projects/'.$imageName;
        if (!$project->photo =='/images/projects/default/project_default.jpg') {
            if (File::exists($project->image)) {
                File::delete($project->image);
                //unlink($image_path);
            }
        }
        $project->update([
            'photo'=>$image_path
        ]);
    }
    return response()->json('image update successfully');
});

Route::get('/all_projects', function () {
    $projects= Project::orderBy('id', 'desc')->get();
    return response()->json($projects);
});
Route::get('/client_pending/project/{id}', [ProjectController::class, 'client_pending_project']);

Route::get('/client_active/project/{id}', [ProjectController::class, 'client_active_project']);

Route::get('/client_complete/project/{id}', [ProjectController::class, 'client_complete_project']);



//module
Route::resource('/module', ModuleController::class);
Route::get('/all_modules', function () {
    $projects= Project::orderBy('id', 'desc')->get();
    return response()->json($projects);
});
Route::get('/product_modules/{id}', function ($id) {
    $projects= Module::orderBy('id', 'desc')->where('project_id', $id)->get();
    return response()->json($projects);
});
Route::get('/project/module/{id}', [ModuleController::class, 'project_modules']);



//task
Route::resource('/task', TaskController::class);
Route::get('/user_active/task/{id}', [TaskController::class, 'user_active_task']);

Route::get('/user_complete/task/{id}', [TaskController::class, 'user_complete_task']);

Route::get('/project/task/{id}', [TaskController::class, 'project_task']);
Route::get('/module/task/{id}', [TaskController::class, 'module_tasks']);


//profile 
Route::get('/profile/edit/{id}', [CustomController::class, 'edit_profile']);
Route::post('/profile/create/{id}', [CustomController::class, 'create_profile']);
Route::put('/profile/update/{id}', [CustomController::class, 'update_profile']);