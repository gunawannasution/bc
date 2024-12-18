@extends('layouts.appbc')

@section('content')
<div class="container mt-5">
    <!-- Judul Halaman -->
    <div class="text-center mb-5">
        <h2><i class="fas fa-stethoscope icon-large"></i> Diagnosa Penyakit</h2>
        <p class="text-muted">Silakan pilih penyakit dan gejala yang dialami untuk melakukan diagnosa.</p>
    </div>

    <!-- Form Diagnosa -->
    <form action="{{ route('diagnosa.store') }}" method="POST">
        @csrf
        {{-- <h2>Pilih Penyakit dan Gejala</h2> --}}
        
        <!-- Dropdown Pilih Penyakit -->
        <div class="mb-3">
            <label for="penyakit_id" class="form-label"><h5>Pilih Penyakit</h5></label>
            <select class="form-control" id="penyakit_id" name="penyakit_id" required>
                <option value="">Pilih Penyakit</option>
                @foreach($penyakits as $penyakit)
                    <option value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>
                @endforeach
            </select>
        </div>
    
        
        <div id="gejala-container">
            <!-- Gejala akan dimuat secara dinamis disini -->
        </div>
        
        <div class="text-center mt-4">
            <!-- Tombol Mulai Diagnosa -->
            <button type="submit" class="btn btn-success mt-3"><i class="fas fa-search"></i> Mulai Diagnosa</button>
        </div>
    </form>
</div>

@push('scripts')
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Ketika penyakit dipilih
        $('#penyakit_id').change(function() {
            var penyakitId = $(this).val();
    
            // Jika penyakit dipilih
            if(penyakitId) {
                // Mengirimkan permintaan AJAX untuk mendapatkan gejala terkait penyakit
                $.ajax({
                    url: '/get-gejala/' + penyakitId, // Pastikan rute ini ada
                    type: 'GET',
                    success: function(response) {
                        // Clear gejala sebelumnya
                        $('#gejala-container').html('');
    
                        // Jika ada gejala yang ditemukan
                        if(response.length > 0) {
                            var gejalaHtml = '<div class="card mt-4"><div class="card-header"><i class="fas fa-symptom"></i> Gejala yang Dialami</div><div class="card-body">';
    
                            // Looping untuk menampilkan setiap gejala
                            $.each(response, function(index, gejala) {
                                gejalaHtml += `
                                    <div class="form-check form-switch d-flex justify-content-between align-items-center">
                                        <label class="form-check-label" for="gejala_switch_${gejala.id}">
                                            ${index + 1}. Apakah Anda mengalami ${gejala.nama}?
                                        </label>
                                        <div class="d-flex align-items-center">
                                            <span class="me-2">No</span>
                                            <input class="form-check-input" type="checkbox" name="gejala_status[${gejala.id}]" value="1" id="gejala_switch_${gejala.id}">
                                            <span class="ms-2">Yes</span>
                                        </div>
                                    </div>`;
                            });
    
                            gejalaHtml += '</div></div>';
                            $('#gejala-container').html(gejalaHtml);  // Memasukkan HTML ke dalam container
                        } else {
                            $('#gejala-container').html('<p>Tidak Ada Gejala Untuk Penyakit Ini, Input Gejala di Menu Gejala atau di Menu Aturan</p>');
                        }
                    },
                    error: function() {
                        alert('Gagal memuat gejala.');
                    }
                });
            } else {
                // Jika tidak ada penyakit yang dipilih, kosongkan gejala
                $('#gejala-container').html('');
            }
        });
    });
</script>
@endpush

@endsection