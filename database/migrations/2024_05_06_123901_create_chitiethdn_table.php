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
        Schema::create('chitiethdn', function (Blueprint $table) {
            $table->string('SoHDN', 10);
            $table->integer('SoLuongNhap');
            $table->integer('KhuyenMai');
            $table->string('MaSach', 10);
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
        Schema::dropIfExists('chitiethdn');
    }
};
