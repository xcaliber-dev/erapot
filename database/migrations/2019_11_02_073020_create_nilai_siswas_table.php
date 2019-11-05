<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_siswa', function (Blueprint $table) {
            $table->string('nis', 10);
            $table->primary('nis');
            $table->integer('mtk')->default(0);
            $table->integer('ipa')->default(0);
            $table->integer('ips')->default(0);
            $table->integer('bhs_indo')->default(0);
            $table->integer('bhs_inggris')->default(0);
            $table->integer('penjas')->default(0);
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
        Schema::dropIfExists('nilai_siswas');
    }
}
