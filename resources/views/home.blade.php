@extends('layouts.appbc')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Left Section: Welcome & Diagnosis Button -->
        <div class="col-lg-6 col-md-8 col-sm-12 mb-4">
            <div class="card shadow-lg border-0 rounded-lg h-100 d-flex flex-column">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="page-title"><i class="fas fa-stethoscope"></i> Sistem Diagnosa Penyakit</h4>
                    <p class="text-white-50">Menggunakan Metode Backward Chaining</p>
                </div>
                <div class="card-body text-center">
                    <p class="intro-text text-muted">
                        Selamat datang di aplikasi kami! Sistem ini membantu Anda dalam mendiagnosa penyakit berdasarkan gejala yang Anda pilih.
                        Gunakan tombol di bawah untuk memulai diagnosa penyakit Anda.
                    </p>

                    <!-- Tombol Diagnosa -->
                    <a href="{{ route('diagnosa.index') }}" class="btn btn-success btn-lg mt-4">
                        <i class="fas fa-search"></i> Mulai Diagnosa
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Section: About the System -->
        <div class="col-lg-6 col-md-4 col-sm-12 mb-4">
            <div class="card shadow-lg border-0 rounded-lg h-100 d-flex flex-column">
                <div class="card-header bg-info text-white text-center">
                    <h5 class="section-title"><i class="fas fa-info-circle"></i> Tentang Sistem</h5>
                </div>
                <div class="card-body text-center">
                    <p class="intro-text text-muted">
                        Aplikasi ini dirancang untuk membantu Anda mendiagnosa penyakit berdasarkan gejala yang Anda alami. 
                        Anda dapat menambahkan penyakit, gejala, dan aturan untuk memperbarui sistem ini sesuai dengan kebutuhan medis Anda.
                    </p>
                    <a href="{{ route('penyakit.index') }}" class="btn btn-info btn-lg mt-4">
                        <i class="fas fa-clipboard-list"></i> Kelola Penyakit & Gejala
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Information or Features -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h2 class="text-primary mb-4">Fitur Utama</h2>
            <p class="lead text-muted">
                Sistem ini memiliki fitur-fitur canggih yang memudahkan dalam mendiagnosa penyakit dengan lebih akurat dan cepat.
                Menggunakan algoritma **Backward Chaining**, sistem akan menganalisa gejala yang Anda pilih untuk mencari penyakit yang cocok.
            </p>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Card 1 -->
        <div class="col">
            <div class="card shadow-lg border-0 rounded-lg d-flex flex-column h-100">
                <div class="card-body text-center">
                    <i class="fas fa-search fa-3x text-primary"></i>
                    <h5 class="card-title mt-3">Diagnosa Penyakit</h5>
                    <p class="card-text">Gunakan sistem ini untuk memulai diagnosa penyakit berdasarkan gejala yang Anda pilih.</p>
                    <a href="{{ route('diagnosa.index') }}" class="btn btn-primary">Mulai Diagnosa</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col">
            <div class="card shadow-lg border-0 rounded-lg d-flex flex-column h-100">
                <div class="card-body text-center">
                    <i class="fas fa-virus fa-3x text-danger"></i>
                    <h5 class="card-title mt-3">Kelola Penyakit</h5>
                    <p class="card-text">Tambah, ubah, atau hapus penyakit dalam sistem untuk meningkatkan akurasi diagnosa.</p>
                    <a href="{{ route('penyakit.index') }}" class="btn btn-danger">Kelola Penyakit</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col">
            <div class="card shadow-lg border-0 rounded-lg d-flex flex-column h-100">
                <div class="card-body text-center">
                    <i class="fas fas fa-heartbeat fa-3x text-warning"></i>
                    <h5 class="card-title mt-3">Kelola Gejala</h5>
                    <p class="card-text">Tambahkan dan kelola gejala untuk meningkatkan kualitas diagnosa penyakit Anda.</p>
                    <a href="{{ route('gejala.index') }}" class="btn btn-warning">Kelola Gejala</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
