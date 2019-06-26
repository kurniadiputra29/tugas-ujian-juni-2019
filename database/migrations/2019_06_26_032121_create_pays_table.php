<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('debts_id');
            $table->date('tgl_kembali');
            $table->integer('denda');
            $table->string('note');
            $table->timestamps();

            $table->foreign('debts_id')->references('id')->on('debts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pays');
    }
}
