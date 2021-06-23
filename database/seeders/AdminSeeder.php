<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = Role::create(['name'=>'admin']);
        $admin = User::create(['name'=>'admin',
                    'user_type'=>'admin',
                    'email'=>'admin@admin.com',
                    'password'=>bcrypt('admin@#1234'),
                    'email_verified_at'=>now()]);
                    
                    $admin->roles()->attach($adminRole);
    }



}
