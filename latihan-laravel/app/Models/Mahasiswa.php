<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
 
class Mahasiswa extends Model
{
    use HasFactory;
 
    protected $table = 'mahasiswas';
 
    protected $fillable = [
        'program_studi_id',
        'nim',
        'nama',
        'email',
        'angkatan',
        'ipk',
        'aktif',
    ];
 
    protected function casts(): array
    {
        return [
            'angkatan' => 'integer',
            'ipk' => 'decimal:2',
            'aktif' => 'boolean',
        ];
    }
 
    // Relasi ke program studi (one to many, sisi belongsTo)
    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }
 
    // Relasi many to many ke matakuliah melalui tabel pivot mahasiswa_matakuliah
    // dengan kolom tambahan 'nilai' (Tugas E.2)
    public function matakuliah(): BelongsToMany
    {
        return $this->belongsToMany(Matakuliah::class, 'mahasiswa_matakuliah')
            ->withPivot('nilai')
            ->withTimestamps();
    }
}
