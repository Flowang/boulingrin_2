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
            $table->integer('users_id');
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->integer('categories_id');
            $table->foreign('categories_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('product');
    }
}
