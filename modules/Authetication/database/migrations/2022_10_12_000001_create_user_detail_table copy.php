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
        Schema::dropIfExists((config('authetication.table_prefix') ?? '') . 'user_detail');
        Schema::create((config('authetication.table_prefix') ?? '') . 'user_detail', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->char('ma_nhan_vien', 6);
            $table->string('ten_nhan_vien', 80)->nullable();
            $table->tinyInteger('gioi_tinh')->nullable();
            $table->string('hinh_anh', 80)->nullable();
            $table->char('so_dien_thoai', 12)->nullable();
            $table->char('cua_hang', 6)->nullable();
            $table->tinyInteger('bo_phan')->default(1);
            $table->tinyInteger('chuc_vu')->default(1);
            $table->string('ghi_chu', 400)->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            //FOREIGN KEY
            $table->foreign('user_id')->references('id')->on((config('authetication.table_prefix') ?? '') . 'users')->onDelete('cascade');
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
