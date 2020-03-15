<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulans', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nama', 20);
            $table->tinyInteger('nilai');
            $table->tinyInteger('nomor');
            $table->tinyInteger('jenis_tahun')->default(0);
            $table->string('jenis_bulan', 1)->default('M');
            $table->smallInteger('jumlah');
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
        Schema::dropIfExists('bulans');
    }
}
