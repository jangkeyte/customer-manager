<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists((config('authetication.table_prefix') ?? '') . 'users_roles');
        Schema::create((config('authetication.table_prefix') ?? '') . 'users_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
    
         //FOREIGN KEY
           $table->foreign('user_id')->references('id')->on((config('authetication.table_prefix') ?? '') . 'users')->onDelete('cascade');
           $table->foreign('role_id')->references('id')->on((config('authetication.table_prefix') ?? '') . 'roles')->onDelete('cascade');
    
         //PRIMARY KEYS
           $table->primary(['user_id','role_id']);
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists((config('authetication.table_prefix') ?? '') . 'users_roles');
    }
};
