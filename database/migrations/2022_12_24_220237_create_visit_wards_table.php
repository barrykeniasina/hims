<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_wards', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('visit_id')->nullable();
            $table->integer('ward_id')->nullable();
            $table->string('detail')->nullable();
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
        Schema::dropIfExists('visit_wards');
    }
};
