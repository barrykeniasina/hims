<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Ward;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ward::create([
            'department_id'=>'11',
            'ward_detail'=>'Resus',
            'type'=>'In-patient',

        ]);

        Ward::create([
            'department_id'=>'11',
            'ward_detail'=>'Acute',
            'type'=>'In-patient',

        ]);

        Ward::create([
            'department_id'=>'11',
            'ward_detail'=>'Adult sub-acute',
            'type'=>'In-patient',

        ]);

        Ward::create([
            'department_id'=>'11',
            'ward_detail'=>'Minor theater',
            'type'=>'In-patient',

        ]);

        Ward::create([
            'department_id'=>'11',
            'ward_detail'=>'Pediatric area',
            'type'=>'In-patient',
            

        ]);

        Ward::create([
            'department_id'=>'11',
            'ward_detail'=>'Triage',
            'type'=>'Out-patient',
            

        ]);

        Ward::create([
            'department_id'=>'11',
            'ward_detail'=>'Resus',
            'type'=>'In-patient',

        ]);
//
        Ward::create([
            'department_id'=>'4',
            'ward_detail'=>'Medical',
            'type'=>'In-patient',

        ]);

        Ward::create([
            'department_id'=>'4',
            'ward_detail'=>'TB',
            'type'=>'Out-patient',

        ]);

        Ward::create([
            'department_id'=>'4',
            'ward_detail'=>'Diabetic Clinic',
            'type'=>'Out-patient',

        ]);

        Ward::create([
            'department_id'=>'4',
            'ward_detail'=>'Oncology',
            'type'=>'Out-patient',

        ]);

    }
}
