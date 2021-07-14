<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugStartupToKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori', function (Blueprint $table) {
            $table->string('slug_startup')->nullable()->after('folder_kategori');

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
        Schema::table('kategori', function (Blueprint $table) {
            $table->dropForeign(['slug_startup']);

            $table->dropColumn('slug_startup');
        });
    }
}
