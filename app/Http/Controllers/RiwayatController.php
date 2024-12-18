<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestStatus\Risky;

class RiwayatController extends Controller
{
    public function index()
    {
        // Mengambil riwayat diagnosa berdasarkan pengguna yang sedang login
        $diagnosisHistories = Riwayat::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('riwayat.index', compact('diagnosisHistories'));
    }
}
