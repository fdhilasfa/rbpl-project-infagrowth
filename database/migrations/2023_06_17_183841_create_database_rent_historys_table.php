<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseRentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('database_rent_history', function (Blueprint $table) {
            $table->bigIncrements('orderID');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('nurse_id');
            $table->integer('durasiSewa');
            $table->date('paymentDate');
            $table->string('paymentStatus', 25);
            $table->string('namaBarang', 25);
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('nurse_id')->references('id')->on('database_nurses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('database_rent_history');
    }
}
