<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{

    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('prix_unité');
            $table->integer('prix_poids')->default(NULL);
            $table->string('img');
            $table->text('description');
            $table->integer('users_id');
            $table
            ->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('product');
    }
}
