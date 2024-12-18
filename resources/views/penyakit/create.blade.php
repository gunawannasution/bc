@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
        
        <div class="mb-4 text-center">
            <h3><i class="fas fa-plus-circle"></i> Tambah Penyakit Baru</h3>
            <p class="text-muted">Masukkan informasi penyakit baru yang akan ditambahkan ke dalam sistem.</p>
        </div>

      
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Formulir Penyakit Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('penyakit.store') }}" method="POST">
                    @csrf

                  
                    <div class="form-group">
                        <label for="nama">Nama Penyakit</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Penyakit</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                   
                    <div class="text-center mt-4 flex ">
                        <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
