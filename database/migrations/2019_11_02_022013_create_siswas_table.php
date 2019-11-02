<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nis', 10);
            $table->primary('nis');
            $table->string('nama_siswa', 30);
            $table->string('kelas', 10);
            $table->boolean('status_lulus');
            $table->string('alamat', 150);
            $table->string('jenis_kelamin', 1);
            $table->date('tgl_lahir');
            $table->string('tempat_lahir', 20);
            $table->string('no_telp', 30);
            $table->string('email', 50)->unique();
            $table->string('foto', 100);
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
        Schema::dropIfExists('siswas');
    }
}
