<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('judul')->nullable();
            $table->timestamp('tanggal_mulai', 0)->nullable();
            $table->timestamp('tanggal_selesai', 0)->nullable();
            $table->string('folder')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('link_daftar')->nullable();
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
        Schema::dropIfExists('registrasi');
    }
}
