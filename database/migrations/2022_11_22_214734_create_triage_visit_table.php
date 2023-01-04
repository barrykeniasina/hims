<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriageVisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triage_visit', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('visit_id')->nullable();
            $table->integer('triage_id')->nullable();
            $table->string('triage_details')->nullable();
            $table->timestamps();

            $table->foreign(['visit_id'], 'FK_triage_visit')->references(['id'])->on('visits')->onUpdate('NO Action')->onDelete('NO Action');           
            $table->foreign(['triage_id'], 'FK_visit_triage')->references(['id'])->on('triages')->onUpdate('NO Action')->onDelete('NO Action');           
            
              

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('triage_visit');
    }
}
