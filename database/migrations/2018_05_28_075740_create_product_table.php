<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id_prod');
            $table->string('nom');
            $table->integer('prix_unite');
            $table->integer('prix_poids')->nullable();
            $table->string('img')->nullable();
            $table->text('description');
            $table->timestamps();
        });


        Schema::table('products', function (Blueprint $table) {
            $table->UnsignedInteger('users_id');
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
        });


    }


    public function down()
    {
        Schema::dropIfExists('product');
    }
}
