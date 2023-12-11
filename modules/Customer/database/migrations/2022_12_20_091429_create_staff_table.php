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
        Schema::create('ktgiang_staff', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->char('ma_nhan_vien', 6);
            $table->string('ten_nhan_vien', 80)->nullable();
            $table->tinyInteger('gioi_tinh')->nullable();
            $table->string('hinh_anh', 80)->nullable();
            $table->char('so_dien_thoai', 12)->nullable();
            $table->char('cua_hang', 6)->nullable();
            $table->tinyInteger('bo_phan')->default(1);
            $table->tinyInteger('chuc_vu')->default(1);
            $table->string('ghi_chu', 400)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('ktgiang_users');
    }
};
