<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->nullable();
            $table->string('ward_detail')->nullable();
            $table->string('type')->nullable();
            $table->timestamps(); 

            $table->foreign(['department_id'])->references(['id'])->on('departments')->onUpdate('NO Action')->onDelete('NO Action');           
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wards');
    }
};
