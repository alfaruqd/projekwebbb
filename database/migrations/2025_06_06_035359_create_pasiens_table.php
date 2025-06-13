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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->string('id_pasien', 10)->primary();
            $table->foreignId('user_id')->unique()->constrained();
            $table->string('nama_pasien', 255);
            $table->string('jenis_kelamin', 255);
            $table->DATE('tanggal_lahir')->nullabel();
            $table->string('no_telp', 255);
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
