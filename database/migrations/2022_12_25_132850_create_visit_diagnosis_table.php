<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitDiagnosisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_diagnoses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visit_id')->nullable();
            $table->string('type')->nullable(); 
            $table->string('category')->nullable();
            $table->integer('icd_id')->nullable();       
            $table->timestamps();

            $table->foreign(['visit_id'])->references(['id'])->on('visits')->onUpdate('NO Action')->onDelete('NO Action');     
            $table->foreign(['icd_id'])->references(['id'])->on('icds')->onUpdate('NO Action')->onDelete('NO Action');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosis');
    }
};
