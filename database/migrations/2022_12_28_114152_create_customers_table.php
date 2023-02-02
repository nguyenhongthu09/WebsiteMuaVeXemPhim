<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('email');
            $table->string('password');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->string('hash_mail')->nullable();
            $table->date('ngay_sinh');
            $table->integer('gioi_tinh');
            $table->integer('loai_tai_khoan')->default(0);
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
        Schema::dropIfExists('customers');
    }
};
