@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
        <!-- Judul Halaman -->
        <div class="text-center mb-4">
            <h3><i class="fas fa-cogs"></i> Daftar Aturan</h3>
            <p class="text-muted">Kelola aturan yang menghubungkan penyakit dengan gejala dalam sistem ini.</p>
        </div>

        <!-- Tombol Tambah Aturan -->
        <div class="mb-3 text-end">
            <a href="{{ route('aturan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Aturan Baru
            </a>
        </div>

        <!-- Card Tabel Daftar Aturan -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Tabel Daftar Aturan</h5>
            </div>
            <div class="card-body">
                <!-- Tabel Daftar Aturan -->
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Penyakit</th>
                            <th>Gejala</th>
                            <th class="text-center" style="width: 200px;">Aksi</th> <!-- Set fixed width for "Aksi" column -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aturans as $aturan)
                            <tr>
                                <td>{{ $aturan->penyakit->nama }}</td>
                                <td>{{ $aturan->gejala->nama }}</td>
                                <td class="text-end">
                                    <!-- Edit Button -->
                                    <a href="{{ route('aturan.edit', $aturan->id) }}" class="btn btn-warning btn-sm me-2" title="Edit Aturan">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Delete Button with Confirmation -->
                                    <form action="{{ route('aturan.destroy', $aturan->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus aturan ini?')" title="Hapus Aturan">
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
