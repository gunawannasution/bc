@extends('layouts.appbc')

@section('content')
    <div class="container">
        {{-- <h2 class="text-center">Hasil Diagnosa</h2> --}}

       <!-- Pesan Error -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @else
            <!-- hasil diagnosa-->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-heart-pulse icon-large"></i> Hasil Diagnosa
                </div>
                <div class="card-body">
                    <h4 class="card-title">Penyakit yang ditemukan:</h4>
                    <p class="card-text"><strong><i class="bi bi-emoji-sunglasses"></i> {{ $recommendedPenyakit->nama }}</strong></p>

                    <!-- gejala terdeteksi -->
                    @if(count($gejalaTerkait) > 0)
                        <h5 class="mt-4">Gejala yang Terdeteksi:</h5>
                        <ul>
                            @foreach($gejalaTerkait as $gejala)
                                <li><i class="bi bi-check-circle"></i> Anda mengalami {{ $gejala }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p><i class="bi bi-x-circle"></i> Tidak ada gejala yang terdeteksi sesuai dengan penyakit ini.</p>
                    @endif

                    <!-- saran -->
                    @if($saran)
                        <h5 class="mt-4">Saran Tindakan:</h5>
                        <p><i class="bi bi-info-circle"></i> {{ $saran }}</p>
                    @else
                        <p><i class="bi bi-question-circle"></i> Mohon konsultasikan dengan tenaga medis untuk diagnosis lebih lanjut.</p>
                    @endif
                    <a href="{{ route('diagnosa.index') }}" class="btn btn-primary back-btn">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
