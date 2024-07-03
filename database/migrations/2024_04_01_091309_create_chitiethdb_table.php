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
        Schema::create('chitiethdb', function (Blueprint $table) {
            $table->string('SoHDB', 10);
            $table->string('MaSach', 10);
            $table->integer('SoLuongBan');
            $table->integer('KhuyenMai');
            $table->string('TenSach', 200);
            $table->string('AnhDaiDien', 60);
            $table->integer('GiaBan', 20);
            $table->primary(['SoHDN', 'MaSach']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiethdb');
    }
};
