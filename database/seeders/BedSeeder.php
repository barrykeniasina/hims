<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Bed;

class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bed::create([
            'ward_id'=>'7',
            'type'=>'Large',
            'code'=>'TB-B001',

        ]);

        Bed::create([
            'ward_id'=>'7',
            'type'=>'Large',
            'code'=>'TB-B002',

        ]);

        Bed::create([
            'ward_id'=>'7',
            'type'=>'Medium',
            'code'=>'TB-B003',

        ]);

        Bed::create([
            'ward_id'=>'8',
            'type'=>'Medium',
            'code'=>'MD-B001',

        ]);

        Bed::create([
            'ward_id'=>'8',
            'type'=>'Medium',
            'code'=>'MD-B002',

        ]);

        Bed::create([
            'ward_id'=>'8',
            'type'=>'Medium',
            'code'=>'MD-B003',

        ]);

        Bed::create([
            'ward_id'=>'8',
            'type'=>'Medium',
            'code'=>'MD-B004',

        ]);

        Bed::create([
            'ward_id'=>'8',
            'type'=>'Medium',
            'code'=>'MD-B005',

        ]);

        //ED beds
        Bed::create([
            'ward_id'=>'1',
            'type'=>'Medium',
            'code'=>'ED-B001',

        ]);

        Bed::create([
            'ward_id'=>'2',
            'type'=>'Medium',
            'code'=>'ED-B002',

        ]);

        Bed::create([
            'ward_id'=>'1',
            'type'=>'Medium',
            'code'=>'ED-B003',

        ]);

        Bed::create([
            'ward_id'=>'1',
            'type'=>'Medium',
            'code'=>'ED-B004',

        ]);

    }
}
