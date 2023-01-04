<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {

            $table->increments('id');
            $table->datetime('visitdate');
            $table->integer('patient_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('entered_by')->nullable();
            $table->string('category')->nullable();
            $table->string('complaint',500)->nullable();
            $table->string('triage_taken')->nullable();
            $table->string('triage')->nullable();
            $table->string('ward')->nullable();
            $table->string('discharged')->nullable();
            $table->datetime('discharge_date')->nullable();
            $table->datetime('review_date')->nullable();
            
            $table->timestamps();

            $table->foreign(['patient_id'], 'FK_patient_visit')->references(['id'])->on('patients')->onUpdate('NO Action')->onDelete('NO Action');           
            $table->foreign(['department_id'], 'FK_department_visit')->references(['id'])->on('departments')->onUpdate('NO Action')->onDelete('NO Action');           
            $table->foreign(['entered_by'], 'FK_user_visit')->references(['id'])->on('users')->onUpdate('NO Action')->onDelete('NO Action');           
              

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
