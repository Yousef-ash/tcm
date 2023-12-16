<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminrole = Role::where('name', 'super')->first();
        
        //
        // User::truncate();
        $super = User::create(['name' => 'Yousef', 'email' => 'super@super.com', 'password'=> '1234']);
        // $teacher = User::create(['name' => 'Ali', 'email' => 'teacher@gmail.com', 'password'=> '1234']);

        $super->roles()->attach($adminrole);
        // $teacher->roles()->attach($teacherrole);
    }
}
