<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Triage;

class TriageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Triage::create([
            'triage_desc'=>'Emergency',

        ]);

        Triage::create([
            'triage_desc'=>'Priority',

        ]);

        Triage::create([
            'triage_desc'=>'Non-urgent',

        ]);
    }
}
