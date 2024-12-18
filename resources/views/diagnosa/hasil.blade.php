<!-- resources/views/diagnosa/hasil.blade.php -->

@extends('layouts.appbc')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2><i class="fas fa-stethoscope icon-large"></i> Hasil Diagnosa</h2>
        <p class="text-muted">Berikut adalah hasil diagnosa berdasarkan penyakit dan gejala yang Anda pilih.</p>
    </div>

    <!-- Menampilkan Penyakit yang Terdiagnosa -->
    <div class="card">
        <div class="card-header">
            <i class="fas fa-stethoscope"></i> Diagnosa Penyakit
        </div>
        <div class="card-body">
            <h4 class="card-title">Penyakit yang Terdiagnosa Adalah: <strong>{{ $penyakit->nama }}</strong></h4>
            

            <!-- Menampilkan Gejala yang Dipilih -->
            <h5 class="mt-4">Daftar Gejala Yang Di Alami </h5>
            <ul>
                @foreach($gejalas as $gejala)
                    <li>Anda Mengalami {{ $gejala->nama }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Tombol Kembali ke Halaman Diagnosa -->
    <div class="text-center mt-4">
        <a href="{{ route('diagnosa.index') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left-circle"></i> Kembali ke Diagnosa
        </a>
    </div>
</div>
@endsection
