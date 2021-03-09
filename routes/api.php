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
//client