<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('database_nurses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaNurse', 25);
            $table->string('getNurseReview', 255);
            $table->string('asal', 25);
            $table->string('tahunPengalaman', 25);
            $table->string('spesialis', 25);
            $table->string('beratNurse', 25);
            $table->string('tinggiNurse', 25);
            $table->string('statusNurse', 25);
            $table->string('TTLNurse', 25);
            $table->string('workExperience', 200);
            $table->string('reviewNurse', 25);
            $table->string('ratingNurse', 25);
            $table->varchar('harga', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_nurses');
    }
};
