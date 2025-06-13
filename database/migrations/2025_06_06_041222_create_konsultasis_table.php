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
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->string('id_konsultasi', 10)->primary();
            // $table->string('id_dokter', 10);
            $table->foreignId('user_id')->unique()->constrained();
            $table->text('pertanyaan');
            $table->text('jawaban')->nullable()->default('-');
            $table->timestamps();

            // $table->foreign('id_dokter')->references('id_dokter')->on('dokters');
            // $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
