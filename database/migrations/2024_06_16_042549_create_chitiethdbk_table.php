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
        Schema::create('chitiethdbk', function (Blueprint $table) {
            $table->string('SoHDBK', 10);
            $table->string('MaSach', 10);
            $table->integer('SoLuongBan');
            $table->string('TenSach', 200);
            $table->string('AnhDaiDien', 50);
            $table->decimal('GiaBan', 10, 2);
            $table->timestamps();  // Adds created_at and updated_at columns

            $table->primary(['SoHDBK', 'MaSach']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitiethdbk');
    }
};
