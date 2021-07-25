<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimStartupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim_startup', function (Blueprint $table) {
            $table->increments('id_tim');
            $table->string('nama')->nullable();
            $table->string('foto')->nullable();
            $table->string('posisi')->nullable();
            $table->char('status')->nullable()
            ->comment("1 = Aktif 2 = Tidak Aktif");
            $table->string('slug_startup')->nullable();
            $table->timestamps();

            $table->foreign('slug_startup')->references('slug')->on('startup');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tim_startup', function (Blueprint $table) {
            $table->dropForeign(['slug_startup']);
        });
        Schema::dropIfExists('tim_startup');
    }
}
