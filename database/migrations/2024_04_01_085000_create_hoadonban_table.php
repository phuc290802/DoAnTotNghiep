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
        Schema::create('hoadonban', function (Blueprint $table) {
            $table->string('SoHDB', 10)->primary();
            $table->string('MaNV', 10);
            $table->string('MaKH', 10);
            $table->date('NgayBan');
            $table->string('TrangThai', 10);
        });
        Schema::table('hoadonban', function (Blueprint $table) {
            $table->primary('SoHDB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadonban');
    }
};
