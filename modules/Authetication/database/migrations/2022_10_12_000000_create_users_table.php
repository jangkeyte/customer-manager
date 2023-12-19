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
        Schema::dropIfExists((config('authetication.table_prefix') ?? '') . 'users');
        Schema::create((config('authetication.table_prefix') ?? '') . 'users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('uid', '80');
            $table->string('username')->unique();
            $table->string('name', '225');
            $table->string('image', 80)->default('default.jpg');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('token', '4096')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists((config('authetication.table_prefix') ?? '') . 'users');
    }
};
