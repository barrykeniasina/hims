<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labs', function (Blueprint $table) {
            
            $table->increments('id');

            $table->integer('visit_id')->nullable();
            $table->integer('result_id')->nullable();
            $table->string('lab_type')->nullable();
            $table->string('spec_type')->nullable();
            $table->string('priority')->nullable();
            $table->string('profile')->nullable();
            $table->string('clinical_notes')->nullable();
            $table->timestamps();


            $table->foreign(['visit_id'])->references(['id'])->on('visits')->onUpdate('NO Action')->onDelete('NO Action');     
            $table->foreign(['result_id'])->references(['id'])->on('results')->onUpdate('NO Action')->onDelete('NO Action');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labs');
    }
};
