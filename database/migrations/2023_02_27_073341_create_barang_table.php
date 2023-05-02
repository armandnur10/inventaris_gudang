<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ruangan')->unsigned();
            $table->integer('id_kategori')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('nama_barang');
            $table->string('gambar');
            $table->text('spek');
            $table->text('stok');
            $table->text('satuan');
            $table->enum('status', ['baik', 'rusak', 'tidak layak']);
            $table->foreign('id_ruangan')->references('id')->on('ruangan')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('barang');
    }
}
