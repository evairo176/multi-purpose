<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('tgl_lahir')->nullable();
            $table->year('tahun_kader')->nullable();
            $table->string('pendidikan')->nullable();
            $table->year('tahun_pelatihan')->nullable();
            $table->string('no_hp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('tahun_kader');
            $table->dropColumn('pendidikan');
            $table->dropColumn('tahun_pelatihan');
            $table->dropColumn('no_hp');
        });
    }
}
