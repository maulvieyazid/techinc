<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('nama_event')->nullable();
            $table->timestamp('tanggal_mulai', 0)->nullable();
            $table->timestamp('tanggal_selesai', 0)->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('event');
    }
}
