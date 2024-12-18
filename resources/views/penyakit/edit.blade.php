@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
      
        <div class="text-center mb-4">
            <h3><i class="fas fa-edit"></i> Edit Penyakit</h3>
            <p class="text-muted">Perbarui informasi penyakit yang sudah ada.</p>
        </div>

        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Edit Data Penyakit</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('penyakit.update', $penyakit->id) }}" method="POST">
                    @csrf
                    @method('PUT')

          
                    <div class="form-group">
                        <label for="nama">Nama Penyakit</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $penyakit->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                  
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Penyakit</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $penyakit->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                  
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Perbarui
                    </button>
                    <a href="{{ route('penyakit.index') }}" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
