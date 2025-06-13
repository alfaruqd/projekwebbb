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
        Schema::create('dokters', function (Blueprint $table) {
            $table->string('id_dokter', 10)->primary();
            $table->string('id_poli', 10);
            $table->string('nama_dokter', 255);
            $table->string('jenis_kelamin_dokter', 255);
            $table->string('bidang_keahlian', 255);
            $table->string('no_telp_dokter', 255);
            $table->timestamps();

            // ✅ Tambahkan foreign key setelah semua kolom didefinisikan
            $table->foreign('id_poli')
                ->references('id_poli')
                ->on('polis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
