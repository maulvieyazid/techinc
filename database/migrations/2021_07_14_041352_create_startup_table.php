<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('nama_startup')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('logo')->nullable();
            $table->timestamp('tanggal_gabung', 0)->nullable();
            $table->timestamp('tanggal_lulus', 0)->nullable();
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
        Schema::dropIfExists('startup');
    }
}
