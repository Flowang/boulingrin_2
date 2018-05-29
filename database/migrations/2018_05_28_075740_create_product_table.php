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
            // $table->foreignkey('id_commerçant');
            $table->integer('prix_unité');
            $table->integer('prix_poids');
            $table->text('description');
            // $table->foreignkey('pre_marche');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('product');
    }
}
