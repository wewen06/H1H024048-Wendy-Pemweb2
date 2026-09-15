<?php
 
namespace Database\Seeders;
 
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;
 
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ProgramStudiSeeder::class);
        $this->call(MatakuliahSeeder::class);
 
        Mahasiswa::factory()->count(30)->create();
 
        // Mengisi tabel pivot mahasiswa_matakuliah dengan kolom tambahan nilai (Tugas E.2)
        $daftarMatakuliahId = Matakuliah::pluck('id');
 
        Mahasiswa::all()->each(function (Mahasiswa $mahasiswa) use ($daftarMatakuliahId) {
            // Setiap mahasiswa mengambil 3-5 matakuliah secara acak beserta nilainya
            $matakuliahDiambil = $daftarMatakuliahId->random(random_int(3, 5));
 
            $data = [];
            foreach ($matakuliahDiambil as $matakuliahId) {
                $data[$matakuliahId] = [
                    'nilai' => fake()->randomElement([4.00, 3.75, 3.50, 3.25, 3.00, 2.75, 2.50, 2.00]),
                ];
            }
 
            $mahasiswa->matakuliah()->attach($data);
        });
    }
}
