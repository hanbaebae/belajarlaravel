<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnLongNameToMPendidikanTerakhirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_pendidikan_terakhir', function (Blueprint $table) {
            $table->string('long_name')->default('-');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_pendidikan_terakhir', function (Blueprint $table) {
            $table->dropColumn('long_name');
        });
    }
}
