<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;

class UserDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Department::create([
            'department_desc'=>'Hospitallity',
        ]);
        Department::create([
            'department_desc'=>'Anaesthetic',
        ]);
        Department::create([
            'department_desc'=>'General Surgery',
        ]);
        Department::create([
            'department_desc'=>'Internal Medicine',
        ]);
        Department::create([
            'department_desc'=>'Obstetrics and Gynaecology',
        ]);
        Department::create([
            'department_desc'=>'Medical Imaging',
        ]);
        Department::create([
            'department_desc'=>'Paediatrics',
        ]);
        Department::create([
            'department_desc'=>'Ophthalmology',
        ]);
        Department::create([
            'department_desc'=>'On Rotation',
        ]);
        Department::create([
            'department_desc'=>'Orthopaedic',
        ]);
        Department::create([
            'department_desc'=>'Emergency',
        ]);
        Department::create([
            'department_desc'=>'Psychiatry',
        ]);

        Department::create([
            'department_desc'=>'Pathology',
        ]);
        Department::create([
            'department_desc'=>'Dental',
        ]);
        Department::create([
            'department_desc'=>'Executive',
        ]);
        Department::create([
            'department_desc'=>'Executive/Corporate Services',
        ]);

        Department::create([
            'department_desc'=>'Executive/Director of Nursing',
        ]);
        Department::create([
            'department_desc'=>'Deputy Director Nursing',
        ]);
        Department::create([
            'department_desc'=>'Executive/Medical',
        ]);

        Department::create([
            'department_desc'=>'Medical Records',
        ]);
        Department::create([
            'department_desc'=>'Outpatient',
        ]);
        Department::create([
            'department_desc'=>'Opthalmology',
        ]);

        Department::create([
            'department_desc'=>'Imaging',
        ]);
        Department::create([
            'department_desc'=>'Lab',
        ]);

    }
}