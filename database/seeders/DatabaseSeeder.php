<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserDepartmentSeeder::class);  
        $this->call(UserTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TriageSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(WardSeeder::class);
      

        $this->call(IcdsSeeder::class);
        $this->call(DischargeMedicationSeeder::class);
        $this->call(BedSeeder::class);
    }
}
