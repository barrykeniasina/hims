<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_admissions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('visit_id')->nullable();
            $table->string('type')->nullable(); 
            $table->integer('admission_by')->nullable(); 
            $table->integer('refered_from')->nullable(); 
            $table->integer('ward_id')->nullable(); 
            $table->integer('user_id')->nullable();
            $table->integer('current_ward')->nullable();  
            $table->string('transport')->nullable(); 
            $table->string('remarks')->nullable();

            $table->integer('bed_id')->nullable();    
            $table->string('approved')->nullable();

            $table->timestamps();

            $table->foreign(['visit_id'])->references(['id'])->on('visits')->onUpdate('NO Action')->onDelete('NO Action');     
            $table->foreign(['admission_by'])->references(['id'])->on('users')->onUpdate('NO Action')->onDelete('NO Action');  
            $table->foreign(['refered_from'])->references(['id'])->on('wards')->onUpdate('NO Action')->onDelete('NO Action'); 
            $table->foreign(['ward_id'])->references(['id'])->on('wards')->onUpdate('NO Action')->onDelete('NO Action'); 
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('NO Action')->onDelete('NO Action'); 
            $table->foreign(['bed_id'])->references(['id'])->on('beds')->onUpdate('NO Action')->onDelete('NO Action'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_admissions');
    }
};
