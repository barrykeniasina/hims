<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitals', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('visit_id')->nullable();
            $table->string('vital_detail')->nullable();
            $table->timestamps();
    
            $table->foreign(['visit_id'])->references(['id'])->on('visits')->onUpdate('NO Action')->onDelete('NO Action');           
             
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
