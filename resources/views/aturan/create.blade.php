@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
        <!-- Judul Halaman -->
        <div class="text-center mb-4">
            <h3><i class="fas fa-cogs"></i> Tambah Aturan Baru</h3>
            <p class="text-muted">Tambahkan aturan penyakit dan gejala di sistem ini.</p>
        </div>

        <!-- Menampilkan Pesan Sukses atau Error -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            </div>
        @endif

        <!-- Form untuk Menambahkan Aturan -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Form Tambah Aturan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('aturan.store') }}" method="POST">
                    @csrf
                    
                    <!-- Pilih Penyakit -->
                    <div class="form-group">
                        <label for="penyakit_id">Pilih Penyakit</label>
                        <select name="penyakit_id" id="penyakit_id" class="form-control" required>
                            <option value="">Pilih Penyakit</option>
                            @foreach($penyakits as $penyakit)
                                <option value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Gejala -->
                    <div class="form-group">
                        <label for="gejala_id">Pilih Gejala</label>
                        <select name="gejala_id" id="gejala_id" class="form-control" required>
                            <option value="">Pilih Gejala</option>
                            @foreach($gejalas as $gejala)
                                <option value="{{ $gejala->id }}">{{ $gejala->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
