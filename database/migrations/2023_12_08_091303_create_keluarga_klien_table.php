<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaKlienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga_klien', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('residence_address')->nullable();
            $table->string('kk_number')->nullable();
            $table->text('kk_address')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('bpjs_category')->nullable();
            $table->integer('gender')->nullable();
            $table->float('monthly_income')->nullable();
            $table->string('work_type')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluarga_klien');
    }
}
