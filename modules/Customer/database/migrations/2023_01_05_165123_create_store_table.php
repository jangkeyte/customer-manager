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
        Schema::create('ktgiang_store', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 50);
            $table->string('name', 80);
            $table->string('address', 400)->nullable();
            $table->char('phone', 12)->nullable();
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
        Schema::dropIfExists('ktgiang_store');
    }
};
