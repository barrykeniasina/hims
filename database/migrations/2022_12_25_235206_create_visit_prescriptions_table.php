<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visit_id')->nullable();
            $table->integer('medication_id')->nullable(); 
            $table->string('dosage')->nullable(); 
            $table->string('unit')->nullable(); 
            $table->string('route')->nullable();
            $table->string('instructions')->nullable();
            $table->integer('entered_by')->nullable(); 
            $table->timestamps();

            $table->foreign(['visit_id'])->references(['id'])->on('visits')->onUpdate('NO Action')->onDelete('NO Action');     
            $table->foreign(['medication_id'])->references(['id'])->on('medications')->onUpdate('NO Action')->onDelete('NO Action');  
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_prescriptions');
    }
};
