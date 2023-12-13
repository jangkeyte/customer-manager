<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktgiang_product', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('uid', 50);
            $table->string('name', 80)->unique();
            $table->string('image', 255)->default('default.jpg');
            $table->Integer('price');
            $table->string('color', 80);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ktgiang_product');
    }
};
