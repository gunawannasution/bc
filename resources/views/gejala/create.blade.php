@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
        <!-- Judul Halaman -->
        <div class="mb-4 text-center">
            <h3><i class="fas fa-plus-circle"></i> Tambah Gejala Baru</h3>
            <p class="text-muted">Silakan masukkan informasi gejala baru yang ingin ditambahkan.</p>
        </div>

        <!-- Card Form Tambah Gejala -->
        <div class="card">
            <div class="text-white card-header bg-primary">
                <h5 class="m-0">Form Tambah Gejala</h5>
            </div>
            <div class="card-body">
                <!-- Form untuk Menambahkan Gejala Baru -->
                <form action="{{ route('gejala.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama Gejala</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 text-right form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
