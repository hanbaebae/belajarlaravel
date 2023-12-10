<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnInKieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kie', function (Blueprint $table) {
            $table->integer('created_by')->nullable(true)->change();
            $table->integer('updated_by')->nullable(true)->change();
            $table->integer('deleted_by')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kie', function (Blueprint $table) {
            $table->integer('created_by')->nullable(false)->change();
            $table->integer('updated_by')->nullable(false)->change();
            $table->integer('deleted_by')->nullable(false)->change();
        });
    }
}
