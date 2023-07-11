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
        Schema::create('kelas_bridges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas', 'id')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('gurus', 'id')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelases', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_bridges');
    }
};
