<?php
 
namespace App\Http\Controllers;
 
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
DB::listen(function ($kueri) {
    logger($kueri->sql);
});

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar seluruh mahasiswa (Langkah 10-11).
     * Menggunakan eager loading with('programStudi') untuk menghindari
     * masalah N+1 (lihat Langkah 12 dan Pertanyaan Pembahasan F.3).
     */
    public function index()
    {
        $daftarMahasiswa = Mahasiswa::with('programStudi')
            ->orderBy('nama')
            ->paginate(10);
 
        return view('mahasiswa.index', [
            'daftarMahasiswa' => $daftarMahasiswa,
        ]);
    }
 
    /**
     * Menampilkan detail satu mahasiswa beserta daftar matakuliah
     * yang diambil dan nilainya (Tugas E.3).
     */
    public function show(string $nim)
    {
        $mahasiswa = Mahasiswa::with(['programStudi', 'matakuliah'])
            ->where('nim', $nim)
            ->firstOrFail();
 
        return view('mahasiswa.show', [
            'mahasiswa' => $mahasiswa,
        ]);
    }
 
    public function cari(Request $request)
    {
        $kataKunci = $request->query('q', '');
 
        $hasil = Mahasiswa::with('programStudi')
            ->when($kataKunci !== '', function ($query) use ($kataKunci) {
                $query->where('nama', 'like', "%{$kataKunci}%")
                    ->orWhere('nim', 'like', "%{$kataKunci}%");
            })
            ->get(['id', 'nim', 'nama']);
 
        return response()->json([
            'kata_kunci' => $kataKunci,
            'metode' => $request->method(),
            'path' => $request->path(),
            'hasil' => $hasil,
        ]);
    }
 
    /**
     * Tugas E.4 — sepuluh mahasiswa dengan IPK tertinggi
     * pada program studi Teknik Komputer.
     */
    public function ipkTertinggi()
    {
        $daftarMahasiswa = Mahasiswa::with('programStudi')
            ->whereHas('programStudi', function ($query) {
                $query->where('kode', 'TK');
            })
            ->orderByDesc('ipk')
            ->take(10)
            ->get();
 
        return view('mahasiswa.ipk-tertinggi', [
            'daftarMahasiswa' => $daftarMahasiswa,
        ]);
    }
}
