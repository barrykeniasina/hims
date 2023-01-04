<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ward_id')->nullable(); 
            $table->string('type')->nullable(); 
            $table->string('code')->nullable();
            $table->timestamps();

            $table->foreign(['ward_id'])->references(['id'])->on('wards')->onUpdate('NO Action')->onDelete('NO Action'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beds');
    }
};
