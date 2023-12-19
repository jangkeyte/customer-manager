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
        Schema::create('ktgiang_customer', function (Blueprint $table) {
            $table->id();
            $table->char('ma_khach_hang', 20)->unique();
            $table->string('ten_khach_hang', 80)->nullable();//
            $table->tinyInteger('gioi_tinh')->nullable();//
            $table->string('dia_chi', 400)->nullable();//
            $table->char('so_dien_thoai', 12)->nullable();//
            $table->string('cach_lay_so', 30)->nullable();//
            $table->tinyInteger('nguon_khach')->nullable();//
            $table->tinyInteger('kenh_lien_he')->nullable();//
            $table->tinyInteger('loai_khach')->nullable();
            $table->dateTime('ngay_nhap')->nullable();
            $table->dateTime('thoi_gian_nhan')->nullable();//
            $table->dateTime('thoi_gian_chuyen')->nullable();//
            $table->char('nguoi_chuyen', 6);//
            $table->char('loai_xe', 20)->nullable();//
            $table->string('mau_xe', 30)->nullable();
            $table->char('so_khung', 30)->nullable();
            $table->char('so_may', 30)->nullable();
            $table->char('nhan_vien', 6);//
            $table->char('cua_hang', 6);//
            $table->string('nhu_cau', 80)->nullable();//
            $table->string('thong_tin_lien_he', 80)->nullable();//
            $table->tinyInteger('tinh_trang')->nullable();
            $table->string('ghi_chu', 400)->nullable();//
            $table->softDeletes();
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
        Schema::dropIfExists('ktgiang_customer');
    }
};
