<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('route');
            $table->unsignedBigInteger('admin_id');
            $table->string('image')->nullable(); // Added image column
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
