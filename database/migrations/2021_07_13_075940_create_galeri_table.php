<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->increments('id_galeri');
            $table->string('nama_foto')->nullable();
            $table->string('foto')->nullable();
            $table->string('slug_kategori')->nullable();
            $table->timestamps();

            $table->foreign('slug_kategori')->references('slug')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->dropForeign(['slug_kategori']);
        });
        Schema::dropIfExists('galeri');
    }
}
