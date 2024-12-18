@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
        <!-- Judul Halaman -->
        <div class="text-center mb-4">
            <h3><i class="fas fa-edit"></i> Edit Aturan</h3>
            <p class="text-muted">Perbarui aturan yang menghubungkan penyakit dengan gejala.</p>
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

        <!-- Form Edit Aturan -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Form Edit Aturan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('aturan.update', $aturan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Pilih Penyakit -->
                    <div class="form-group">
                        <label for="penyakit_id">Pilih Penyakit</label>
                        <select name="penyakit_id" id="penyakit_id" class="form-control" required>
                            <option value="">Pilih Penyakit</option>
                            @foreach($penyakits as $penyakit)
                                <option value="{{ $penyakit->id }}" {{ $penyakit->id == $aturan->penyakit_id ? 'selected' : '' }}>
                                    {{ $penyakit->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Gejala -->
                    <div class="form-group">
                        <label for="gejala_id">Pilih Gejala</label>
                        <select name="gejala_id" id="gejala_id" class="form-control" required>
                            <option value="">Pilih Gejala</option>
                            @foreach($gejalas as $gejala)
                                <option value="{{ $gejala->id }}" {{ $gejala->id == $aturan->gejala_id ? 'selected' : '' }}>
                                    {{ $gejala->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-save"></i> Perbarui
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
