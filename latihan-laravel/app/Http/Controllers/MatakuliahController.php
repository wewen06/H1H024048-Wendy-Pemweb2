<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    protected array $daftarMatakuliah = [
        ['kode' => 'IF101', 'nama' => 'Algoritma dan Pemrograman', 'sks' => 4],
        ['kode' => 'IF102', 'nama' => 'Struktur Data', 'sks' => 3],
        ['kode' => 'IF201', 'nama' => 'Basis Data', 'sks' => 3],
        ['kode' => 'IF202', 'nama' => 'Pemrograman Web II', 'sks' => 3],
        ['kode' => 'IF301', 'nama' => 'Etika Profesi', 'sks' => 2],
    ];

    public function index(Request $request)
    {
        $kataKunci = $request->query('q', '');

        $hasil = $this->daftarMatakuliah;

        if ($kataKunci !== '') {
            $hasil = array_filter($hasil, function ($mk) use ($kataKunci) {
                return str_contains(strtolower($mk['nama']), strtolower($kataKunci))
                    || str_contains(strtolower($mk['kode']), strtolower($kataKunci));
            });
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $hasil,
            'kataKunci' => $kataKunci,
        ]);
    }

    public function show(string $kode)
    {
        $matakuliah = collect($this->daftarMatakuliah)
            ->firstWhere('kode', $kode);

        abort_if($matakuliah === null, 404);

        return view('matakuliah.show', ['matakuliah' => $matakuliah]);
    }
}