<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'role_desc'=>'Admin',
        ]);
        Role::create([
            'role_desc'=>'Doctor',
        ]);
        Role::create([
            'role_desc'=>'Registered nurse',
        ]);
        Role::create([
            'role_desc'=>'Licensed practical nurse',
        ]);
        Role::create([
            'role_desc'=>'Physical therapist',
        ]);
        Role::create([
            'role_desc'=>'Occupational therapis',
        ]);
        Role::create([
            'role_desc'=>'Hospital pharmacist',
        ]);

    }
}