<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdUsersOnJomasUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('joma_users', function (Blueprint $table) {
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('joma_users');
    }
}
