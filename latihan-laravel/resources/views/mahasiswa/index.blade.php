@extends('layouts.app')
@section('judul', 'Data Mahasiswa')
@section('konten')
<h1 class="h3 mb-4">Data Mahasiswa</h1>
 
@if (session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif
 
<table class="table table-striped bg-white">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>IPK</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarMahasiswa as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->programStudi->nama }}</td>
                <td>{{ $mahasiswa->angkatan }}</td>
                <td>{{ $mahasiswa->ipk }}</td>
                <td>
                    <a href="{{ route('mahasiswa.show', $mahasiswa->nim) }}" class="btn btn-sm btn-primary">
                        Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Data belum tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
 
{{ $daftarMahasiswa->links() }}
@endsection
