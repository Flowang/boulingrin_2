<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichesTable extends Migration
{


    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }


    
    public function down()
    {
        Schema::dropIfExists('fiches');
    }
}
