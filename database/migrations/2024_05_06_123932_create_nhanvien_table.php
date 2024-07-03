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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id();
            $table->string('MaNV', 10)->unique();
            $table->string('TenNV', 30);
            $table->string('UserName', 100);
            $table->text('GioiTinh');
            $table->string('DiaChi', 50);
            $table->string('DienThoai', 10);
            $table->date('NgaySinh');
            $table->string('AnhDaiDien', 50);
            $table->string('password', 255);
            $table->timestamps();
        });
        Schema::table('nhanvien', function (Blueprint $table) {
            $table->primary('MaNV');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
};
