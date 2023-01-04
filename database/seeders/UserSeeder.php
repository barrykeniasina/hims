<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin User',
            'email'=>'admin@admin.com',
            'user_role_id'=>'1',
            'password'=>Hash::make('secret'),
        ]);

        User::create([
            'name'=>'Dr Gareth Bale',
            'email'=>'gbale@admin.com',
            'user_role_id'=>'2',
            'user_department_id'=>'24',
            'password'=>Hash::make('secret'),
        ]);

        User::create([
            'name'=>'Dr David Beckham',
            'email'=>'db@admin.com',
            'user_role_id'=>'2',
            'user_department_id'=>'11',
            'password'=>Hash::make('secret'),
        ]);

        User::create([
            'name'=>'Dr Lionel Ron',
            'email'=>'LRon@sig.gov.sb',
            'user_role_id'=>'2',
            'user_department_id'=>'4',
            'password'=>Hash::make('secret'),
        ]);

        User::create([
            'name'=>'Dr Abigail Spondor',
            'email'=>'Aspondor@sig.gov.sb',
            'user_role_id'=>'2',
            'user_department_id'=>'4',
            'password'=>Hash::make('secret'),
        ]);

    }
}
