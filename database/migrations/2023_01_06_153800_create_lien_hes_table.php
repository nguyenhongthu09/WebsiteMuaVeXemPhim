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
        Schema::create('lien_hes', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('email');
            $table->string('tieu_de');
            $table->text('noi_dung');
            $table->integer('is_xu_ly')->default(0);
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
        Schema::dropIfExists('lien_hes');
    }
};
