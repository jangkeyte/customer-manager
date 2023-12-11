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
        Schema::create('ktgiang_carelog', function (Blueprint $table) {
            $table->id();
            $table->char('khach_hang', 20);
            $table->char('nhan_vien', 6)->nullable();
            $table->string('noi_dung', 400)->nullable();
            $table->tinyInteger('loai_cham_soc')->nullable();
            $table->tinyInteger('tinh_trang')->default(1);
            $table->datetime('ngay_thuc_hien')->nullable();
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
        Schema::dropIfExists('ktgiang_carelog');
    }
};
