<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ghe_bans', function (Blueprint $table) {
            $table->string('ma_giao_dich')->nullable();
            $table->integer('id_khach_hang')->nullable();
            $table->integer('trang_thai')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ghe_bans', function (Blueprint $table) {
            //
        });
    }
};
