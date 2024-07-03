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
        Schema::create('sach', function (Blueprint $table) {
            $table->string('MaSach', 10)->primary();
            $table->string('TenSach', 100);
            $table->string('MaTL', 10);
            $table->string('MaNXB', 10);
            $table->string('MaTG', 10);
            $table->integer('GiaNhap');
            $table->integer('GiaBan');
            $table->integer('SoTrang');
            $table->string('TrongLuong', 10);
            $table->string('AnhDaiDien', 10);
            $table->string('MoTa', 1000);
            $table->integer('SoLuong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sach');
    }
};
