<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->string('breed')->nullable();
            $table->unsignedInteger('age')->default(0); // usia dalam tahun
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('animals');
    }
};
