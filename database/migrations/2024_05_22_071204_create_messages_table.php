<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('MaNV',255);
            $table->string('MaKH',255); 
            $table->string('message',10000); 
            $table->timestamp('thoigiannhan'); 
            $table->int('check');
            $table->int('ThongBao');
            $table->int('emoji');
            $table->timestamps();


            $table->foreign('MaNV')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('MaKh')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
