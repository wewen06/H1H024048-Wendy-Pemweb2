<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')
                ->constrained('mahasiswas')
                ->cascadeOnDelete();
            $table->foreignId('matakuliah_id')
                ->constrained('matakuliahs')
                ->cascadeOnDelete();
            // Kolom tambahan pada tabel pivot sesuai soal E.2
            $table->decimal('nilai', 4, 2)->nullable();
            $table->timestamps();
 
            // Mencegah mahasiswa yang sama mengambil matakuliah yang sama dua kali
            $table->unique(['mahasiswa_id', 'matakuliah_id']);
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
