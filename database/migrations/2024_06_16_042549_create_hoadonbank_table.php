<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hoadonbank', function (Blueprint $table) {
            $table->string('SoHDBK', 10)->primary();
            $table->string('MaNV', 10);
            $table->string('TenKH', 50);
            $table->string('email', 20);
            $table->integer('DienThoai', 20);
            $table->string('DiaChi', 200);
            $table->date('NgayBan');
            $table->integer('TrangThai', 10);
            $table->timestamps();  // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadonbank');
    }
};
