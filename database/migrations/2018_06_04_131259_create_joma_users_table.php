<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJomaUsersTable extends Migration
{

    public function up()
    {
        Schema::create('joma_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_joma');
            $table->timestamps();
            $table->unsignedInteger('id_users');
        });
    }


    public function down()
    {
        Schema::dropIfExists('joma_users');
    }
}
