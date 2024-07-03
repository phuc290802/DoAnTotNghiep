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
    public function up():void
    {
        Schema::create('anh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TenFileAnh');
            $table->unsignedBigInteger('MaSach');
            $table->foreign('MaSach')->references('MaSach')->on('sach')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('anh', function (Blueprint $table) {
            $table->primary('TenFileAnh');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('anh');
    }
};
