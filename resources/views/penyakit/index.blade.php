@extends('layouts.appbc')

@section('content')
    <div class="container mt-5">
       
        <div class="text-center mb-4">
            <h3><i class="fas fa-virus"></i> Daftar Penyakit</h3>
            <p class="text-muted">Kelola data penyakit yang terkait dalam sistem ini.</p>
        </div>

      
        <div class="mb-3 text-end">
            <a href="{{ route('penyakit.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah
            </a>
        </div>


        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Tabel Daftar Penyakit</h5>
            </div>
            <div class="card-body">
               
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Penyakit</th>
                            <th>Deskripsi</th>
                            <th class="text-center" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyakits as $penyakit)
                            <tr>
                                <td>{{ $penyakit->kode }}</td>
                                <td>{{ $penyakit->nama }}</td>
                                <td>{{ $penyakit->deskripsi }}</td>
                                <td class="text-center">
                                    
                                    <a href="{{ route('penyakit.edit', $penyakit->id) }}" class="btn btn-warning btn-sm me-2" title="Edit Penyakit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                  
                                    <form action="{{ route('penyakit.destroy', $penyakit->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus penyakit ini?')" title="Hapus Penyakit">
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
