<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjaBerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanja_beras', function (Blueprint $table) {
            $table->id();
            $table->string('id_zakat')->nullable();
            $table->string('jumlah_uang')->nullable();
            $table->string('total_belanja')->nullable();
            $table->string('saldo')->nullable();
            $table->string('beras')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('belanja_beras');
    }
}
