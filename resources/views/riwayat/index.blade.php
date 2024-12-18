<!-- resources/views/diagnosis_history/index.blade.php -->

@extends('layouts.appbc')

@section('title', 'Riwayat Diagnosa')

@section('content')
    <div class="container mt-4">
        <h2 class="text-xl font-semibold mb-4">Riwayat Diagnosa</h2>

        @if($diagnosisHistories->isEmpty())
            <div class="alert alert-info">
                Belum ada riwayat diagnosa.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penyakit</th>
                        <th>Gejala</th>
                        <th>Tanggal Diagnosa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diagnosisHistories as $history)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $history->penyakit->nama }}</td>
                            <td>
                                @foreach(json_decode($history->gejala) as $gejala)
                                    <span class="badge bg-secondary">{{ $gejala }}</span>
                                @endforeach
                            </td>
                            <td>{{ $history->diagnosed_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
