<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdMPendidikanTerakhirToKeluargaKlienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keluarga_klien', function (Blueprint $table) {
            $table->unsignedBigInteger('id_m_pendidikan_terakhir');
            $table->foreign("id_m_pendidikan_terakhir")->references("id")->on('m_pendidikan_terakhir')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keluarga_klien', function (Blueprint $table) {
            $table->dropColumn('id_m_pendidikan_terakhir');
        });
    }
}
