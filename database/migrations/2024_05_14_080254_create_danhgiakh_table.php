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
        Schema::create('danhgiakh', function (Blueprint $table) {
            $table->string('MaDG', 10)->primary();
            $table->string('MaKH', 10);
            $table->date('ThoiGian');
            $table->string('DanhGia',1000);
            $table->string('MaSach', 10);
            $table->string('Vote',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhgiakh');
    }
};
