@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
        <!-- Judul Halaman -->
        <div class="mb-4 text-center">
            <h3><i class="fas fa-edit"></i> Edit Gejala</h3>
            <p class="text-muted">Ubah informasi gejala yang ada di sistem ini.</p>
        </div>

        <!-- Form Edit Gejala -->
        <a href="{{ route('gejala.index') }}" class="btn btn-secondary">Kembali</a>
        <div class="card">

            <div class="text-white card-header bg-primary">
                <h5 class="m-0">Form Edit Gejala</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('gejala.update', $gejala->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Kolom Nama Gejala -->
                    <div class="form-group">
                        <label for="nama">Nama Gejala</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $gejala->nama) }}" required>
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kolom Kode Gejala (Optional) -->
                    {{-- <div class="form-group">
                        <label for="kode">Kode Gejala</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode', $gejala->kode) }}" required>
                        @error('kode')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <!-- Tombol Submit -->
                    <div class="mt-4 text-right form-group">
                    <button type="submit" class="btn btn-primary">Perbarui Gejala</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
