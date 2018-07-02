<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
 
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->UnsignedInteger('roles_id')->nullable();
            $table->foreign('roles_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');
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
