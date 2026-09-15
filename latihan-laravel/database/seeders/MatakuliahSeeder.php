<?php
 
namespace Database\Seeders;
 
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;
 
class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $daftar = [
            ['kode' => 'IF101', 'nama' => 'Algoritma dan Pemrograman', 'sks' => 4, 'semester' => 1],
            ['kode' => 'IF102', 'nama' => 'Struktur Data', 'sks' => 3, 'semester' => 2],
            ['kode' => 'IF201', 'nama' => 'Basis Data', 'sks' => 3, 'semester' => 3],
            ['kode' => 'IF202', 'nama' => 'Pemrograman Web II', 'sks' => 3, 'semester' => 4],
            ['kode' => 'IF301', 'nama' => 'Etika Profesi', 'sks' => 2, 'semester' => 5],
            ['kode' => 'IF302', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 5],
            ['kode' => 'IF303', 'nama' => 'Kecerdasan Buatan', 'sks' => 3, 'semester' => 6],
        ];
 
        foreach ($daftar as $item) {
            Matakuliah::create($item);
        }
    }
}
