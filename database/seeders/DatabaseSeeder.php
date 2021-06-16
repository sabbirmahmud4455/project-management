<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\app_info;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $passSystem = 741852963;
        $userSystem = User::create([
            'name' => 'Sabbir',
            'email' => 'sabbir@aleshasolutions.com',
            'status' => 1,
            'password' => bcrypt($passSystem),
            //'remember_token' => str_random(10),
        ]);

        $user_profile = Profile::create([
            "user_id" => $userSystem->id
        ]);

        $user_role = UserRole::create([
            "user_id" => $userSystem->id,
            "name" => "Admin"
        ]);

        $app_info = app_info::create([
            'id' => 1
        ]);
    }
}
