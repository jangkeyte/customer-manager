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
        Schema::dropIfExists((config('authetication.table_prefix') ?? '') . 'users_permissions');
        Schema::create((config('authetication.table_prefix') ?? '') . 'users_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('permission_id');
    
            //FOREIGN KEY
            $table->foreign('user_id')->references('id')->on((config('authetication.table_prefix') ?? '') . 'users')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on((config('authetication.table_prefix') ?? '') . 'permissions')->onDelete('cascade');
    
            //PRIMARY KEYS
            $table->primary(['user_id','permission_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists((config('authetication.table_prefix') ?? '') . 'users_permissions');
    }
};
