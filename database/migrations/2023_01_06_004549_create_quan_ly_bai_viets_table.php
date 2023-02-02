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
        Schema::create('quan_ly_bai_viets', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de');
            $table->longText('mo_ta_ngan');
            $table->longText('noi_dung');
            $table->string('hinh_anh');
            $table->integer('is_open')->default(1);
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
        Schema::dropIfExists('quan_ly_bai_viets');
    }
};
