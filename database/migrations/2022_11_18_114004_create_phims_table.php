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
        Schema::create('phims', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phim');
            $table->string('slug_ten_phim')->unique();
            $table->string('dao_dien');
            $table->string('dien_vien');
            $table->string('the_loai');
            $table->integer('thoi_luong');
            $table->date('ngay_khoi_chieu');
            $table->string('avatar');
            $table->text('mo_ta');
            $table->string('trailer');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phims');
    }
};
