<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('judul')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('slug_kategori')->nullable();
            $table->timestamps();

            $table->foreign('slug_kategori')->references('slug')->on('kategori_news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['slug_kategori']);
        });
        Schema::dropIfExists('news');
    }
}
