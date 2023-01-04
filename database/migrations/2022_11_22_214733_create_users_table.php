<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('user_role_id')->nullable();
            $table->integer('user_department_id')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign(['user_role_id'], 'FK_user_role')->references(['id'])->on('roles')->onUpdate('NO Action')->onDelete('NO Action');           
            $table->foreign(['user_department_id'], 'FK_department_role')->references(['id'])->on('departments')->onUpdate('NO Action')->onDelete('NO Action');           
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
