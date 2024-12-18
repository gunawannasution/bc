@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
        <!-- Judul Halaman -->
        <div class="text-center mb-4">
            <h3><i class="fas fa-list-alt"></i> Daftar Gejala</h3>
            <p class="text-muted">Kelola gejala yang terkait dengan penyakit dalam sistem ini.</p>
        </div>

        <!-- Tombol Tambah Gejala -->
        <div class="mb-3 text-end">
            <a href="{{ route('gejala.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah
            </a>
        </div>

        <!-- Card Tabel Daftar Gejala -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Tabel Daftar Gejala</h5>
            </div>
            <div class="card-body">
                <!-- Tabel Daftar Gejala -->
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Gejala</th>
                            <th class="text-center" style="width: 200px;">Aksi</th> <!-- Set fixed width for "Aksi" column -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejalas as $gejala)
                            <tr>
                                <td>{{ $gejala->kode }}</td>
                                <td>{{ $gejala->nama }}</td>
                                <td class="text-end">
                                    <!-- Edit Button -->
                                    <a href="{{ route('gejala.edit', $gejala->id) }}" class="btn btn-warning btn-sm me-2" title="Edit Gejala">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Delete Button with Confirmation -->
                                    <form action="{{ route('gejala.destroy', $gejala->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus gejala ini?')" title="Hapus Gejala">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
