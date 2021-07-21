<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_member', function (Blueprint $table) {
            $table->unsignedInteger('id_member')->nullable();
            $table->unsignedInteger('id_jenis')->nullable();

            $table->foreign('id_member')->references('id_member')->on('member');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis_member');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_member', function (Blueprint $table) {
            $table->dropForeign(['id_member']);
            $table->dropForeign(['id_jenis']);
        });
        Schema::dropIfExists('role_member');
    }
}
