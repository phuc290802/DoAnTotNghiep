<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 255)->primary(); // Sử dụng primary() để định nghĩa khóa chính
            $table->mediumText('value');
            $table->integer('expiration');
            $table->unique('expiration'); // Thêm chỉ mục unique cho cột expiration
        });
    }

    public function down()
    {
        Schema::dropIfExists('cache');
    }
};

