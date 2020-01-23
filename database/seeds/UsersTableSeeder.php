<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Roles;
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
        DB::table('roles_user')->truncate();

        $adminRole = Roles::where('name', 'admin')->first();
        $authorRole = Roles::where('name', 'author')->first();
        $userRole = Roles::where('name', 'user')->first();

        $admin = User::create([
            'name'=>'Amin user',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password')
        ]);

        $author = User::create([
            'name'=>'Author user',
            'email'=>'author@author.com',
            'password'=>Hash::make('password')
        ]);

        $user = User::create([
            'name'=>'Generic user',
            'email'=>'user@user.com',
            'password'=>Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
