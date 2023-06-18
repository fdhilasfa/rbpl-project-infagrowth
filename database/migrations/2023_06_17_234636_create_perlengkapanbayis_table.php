<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerlengkapanbayisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perlengkapanbayis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namaBarang', 255);
            $table->integer('hargaBarang')->length(10);
            $table->string('rating', 50);
            $table->string('lokasi', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perlengkapanbayis');
    }
}
