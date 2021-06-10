<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole= Role::where('name', 'Administrator')->first();
        $empRole= Role::where('name', 'Employee')->first();

        $admin = User::create([
            'username'=> 'admin',
            'name'=> 'Admin User',
            'email'=> 'admin@mail.com',
            'password'=> Hash::make('12345678')
        ]);

        $employee = User::create([
            'username'=> 'jomskiee',
            'name' => 'Jomilen Dela Torre',
            'email' => 'jomilen@mail.com',
            'password'=> Hash::make('12345678')
        ]);
        $employee1 = User::create([
            'username'=> 'sioc',
            'name' => 'Ryan Jay Sioc',
            'email' => 'ryan@mail.com',
            'password'=> Hash::make('12345678')
        ]);
        $admin1 = User::create([
            'username'=> 'admin1',
            'name'=> 'Admin User1',
            'email'=> 'admin1@mail.com',
            'password'=> Hash::make('12345678')
        ]);
        $admin2 = User::create([
            'username'=> 'admin2',
            'name'=> 'Admin User2',
            'email'=> 'admin2@mail.com',
            'password'=> Hash::make('12345678')
        ]);

        $admin->roles()->attach($adminRole);
        $employee->roles()->attach($empRole);
        $employee1->roles()->attach($empRole);
        $admin1->roles()->attach($adminRole);
        $admin2->roles()->attach($adminRole);
    }
}
