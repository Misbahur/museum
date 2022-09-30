<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('kategori_id');
            $table->unSignedBigInteger('sesi_id');
            $table->unsignedBigInteger('pengunjung_id');
            $table->unsignedBigInteger('doc_persyaratan_id')->nullable();
            $table->unsignedBigInteger('buktibayar_id')->nullable();
            $table->string('barcode');
            $table->date('tanggal_berkunjung');
            $table->integer('jumlah_pengunjung');
            $table->enum('status', ['belum', 'sudah', 'selesai']);
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
        Schema::dropIfExists('transaksis');
    }
}
