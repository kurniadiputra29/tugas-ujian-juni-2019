<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('members_id');
            $table->unsignedInteger('item_id');
            $table->date('tgl_pinjam');
            $table->string('jumlah');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('members_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts');
    }
}
