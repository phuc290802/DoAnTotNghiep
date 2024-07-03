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
        Schema::create('khachhang', function (Blueprint $table) {
            $table->string('MaKH', 10)->primary();
            $table->string('TenKH', 30);
            $table->string('UserName', 100);
            $table->string('GioiTinh', 10);
            $table->string('DiaChi', 50);
            $table->string('DienThoai', 10);
            $table->string('AnhDaiDien', 50);
            $table->timestamps();
            $table->string('password', 100);

        });
        Schema::table('khachhang', function (Blueprint $table) {
            $table->primary('MaKH');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
};
