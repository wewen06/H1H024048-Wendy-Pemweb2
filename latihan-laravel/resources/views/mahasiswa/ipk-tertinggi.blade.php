@extends('layouts.app')
@section('judul', 'Sepuluh IPK Tertinggi - Teknik Komputer')
@section('konten')
<h1 class="h3 mb-4">Sepuluh Mahasiswa IPK Tertinggi — Teknik Komputer</h1>
 
<table class="table table-striped bg-white">
    <thead>
        <tr>
            <th>Peringkat</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>IPK</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarMahasiswa as $index => $mahasiswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->angkatan }}</td>
                <td>{{ $mahasiswa->ipk }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada data mahasiswa program studi Teknik Komputer</td>
            </tr>
        @endforelse
    </tbody>
</table>
 
<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
