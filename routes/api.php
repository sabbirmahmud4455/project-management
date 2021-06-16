<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\SprintTaskController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\User\TaskController as UserTaskController;

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

Route::get('/all_users', [UserController::class, 'get_all_users']);

Route::post('/users/update/{user}', [UserController::class, 'image_update']);
//user


//project
Route::resource('/project', ProjectController::class);

Route::post('/projects/update/{project}', [ProjectController::class, 'image_update']);

Route::get('/all_projects',  [ProjectController::class, 'all_project']);
Route::get('/client_pending/project/{id}', [ProjectController::class, 'client_pending_project']);

Route::get('/client_active/project/{id}', [ProjectController::class, 'client_active_project']);

Route::get('/client_complete/project/{id}', [ProjectController::class, 'client_complete_project']);



//module
Route::resource('/module', ModuleController::class);
// Route::get('/all_modules', function () {
//     $projects = Project::orderBy('id', 'desc')->get();
//     return response()->json($projects);
// });
Route::get('/product_modules/{id}', [ModuleController::class, 'project_modules']);

Route::get('/project/module/{id}', [ModuleController::class, 'project_modules_pag']);



//task
Route::resource('/task', TaskController::class);
Route::get('/tasks-list', [TaskController::class, 'get_all_task']);
Route::get('/user_active/task/{id}', [TaskController::class, 'user_active_task']);

Route::get('/user_complete/task/{id}', [TaskController::class, 'user_complete_task']);

Route::get('/project/task/{id}', [TaskController::class, 'project_task_pagination']);
Route::get('/project/task/w/{id}', [TaskController::class, 'project_task']);
Route::get('/module/task/{id}', [TaskController::class, 'module_tasks']);
Route::get('/module/task/w/{id}', [TaskController::class, 'Wmodule_tasks']);
Route::get('/tasks/independent-task', [TaskController::class, 'independent_tasks']);





//profile
Route::get('/profile/edit/{id}', [CustomController::class, 'edit_profile']);
Route::post('/profile/create/{id}', [CustomController::class, 'create_profile']);
Route::put('/profile/update/{id}', [CustomController::class, 'update_profile']);

//project desc
Route::get('/project_desc/edit/{id}', [CustomController::class, 'edit_project_desc']);
Route::post('/project_desc/create/{id}', [CustomController::class, 'create_project_desc']);
Route::post('/project_desc/update/{id}', [CustomController::class, 'update_project_desc']);


Route::get('/download/{id}', [CustomController::class, 'download']);

//app info
Route::get('/app_info', [CustomController::class, 'app_info']);
Route::post('/app_info', [CustomController::class, 'app_info_update']);

//sprint
Route::resource('/sprint', SprintController::class);

// sprint task
Route::resource('/sprint/sprint-task', SprintTaskController::class);

//auth routes

Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

//user routes

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/get-profile', [UserController::class, 'getProfile']);
    Route::get('/my-task', [UserTaskController::class, 'myTask']);
});

Route::post('upload-image', [ImageController::class, 'upload']);
