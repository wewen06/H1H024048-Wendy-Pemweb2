@extends('layouts.app')
@section('judul', 'Detail Mahasiswa')
@section('konten')
<h1 class="h3 mb-4">Detail Mahasiswa</h1>
 
<div class="card mb-4">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">NIM</dt>
            <dd class="col-sm-9">{{ $mahasiswa->nim }}</dd>
 
            <dt class="col-sm-3">Nama</dt>
            <dd class="col-sm-9">{{ $mahasiswa->nama }}</dd>
 
            <dt class="col-sm-3">Program Studi</dt>
            <dd class="col-sm-9">{{ $mahasiswa->programStudi->nama }} ({{ $mahasiswa->programStudi->jenjang }})</dd>
 
            <dt class="col-sm-3">Angkatan</dt>
            <dd class="col-sm-9">{{ $mahasiswa->angkatan }}</dd>
 
            <dt class="col-sm-3">IPK</dt>
            <dd class="col-sm-9">{{ $mahasiswa->ipk }}</dd>
 
            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">{{ $mahasiswa->aktif ? 'Aktif' : 'Tidak aktif' }}</dd>
        </dl>
    </div>
</div>
 
<h2 class="h5 mb-3">Matakuliah yang Diambil</h2>
<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswa->matakuliah as $matakuliah)
            <tr>
                <td>{{ $matakuliah->kode }}</td>
                <td>{{ $matakuliah->nama }}</td>
                <td>{{ $matakuliah->sks }}</td>
                <td>{{ $matakuliah->semester }}</td>
                <td>{{ $matakuliah->pivot->nilai ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Mahasiswa ini belum mengambil matakuliah apa pun</td>
            </tr>
        @endforelse
    </tbody>
</table>
 
<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
