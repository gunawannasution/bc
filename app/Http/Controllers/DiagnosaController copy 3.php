<?php
namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{

    public function index()
    {
        $penyakits = Penyakit::all();
        return view('diagnosa.index', compact('penyakits'));
    }


    public function getGejalaByPenyakit($penyakit_id)
    {
        $penyakit = Penyakit::find($penyakit_id);

        // Jika penyakit ditemukan, ambil gejalanya
        if ($penyakit) {
            $gejalas = $penyakit->gejalas;  // Asumsi ada relasi gejalas() di model Penyakit
            return response()->json($gejalas);  // Mengembalikan gejala dalam format JSON
        }

        // Jika penyakit tidak ditemukan, kembalikan response kosong
        return response()->json([]);
    }
    // Mengambil semua gejala jika tidak ada gejala yang ditemukan untuk penyakit
    public function getAllGejala()
    {
        $gejalas = Gejala::all();
        return response()->json($gejalas);
    }

    // Menyimpan diagnosa yang dipilih
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'penyakit_id' => 'required|exists:penyakits,id',
            'gejala_status' => 'required|array|min:1', // Pastikan ada minimal 1 gejala yang dipilih
            'gejala_status.*' => 'in:1,0', // Pastikan jawabannya Ya (1) atau Tidak (0)
        ]);

        // Ambil gejala yang dipilih dan jawabannya
        $selectedGejalas = [];
        $hasPositiveAnswer = false; // Flag untuk mengecek jika ada jawaban Ya (1)

        foreach ($request->gejala_status as $gejala_id => $status) {
            if ($status == 1) { // hanya pilih gejala yang dijawab "Ya"
                $selectedGejalas[] = $gejala_id;
                $hasPositiveAnswer = true;
            }
        }

        // Jika tidak ada jawaban "Ya" (1), tampilkan error
        if (!$hasPositiveAnswer) {
            return redirect()->route('diagnosa.index')->with('error', 'Tidak ada gejala yang sesuai, silakan pilih gejala yang Anda alami.');
        }

        // Logika backward chaining dengan logika AND:
        // Cari semua penyakit yang mungkin berdasarkan gejala yang dipilih
        $penyakitGejalaMatchCount = [];
        $allPenyakits = Penyakit::all(); // Ambil semua penyakit

        foreach ($allPenyakits as $penyakitItem) {
            // Ambil aturan untuk penyakit ini yang memiliki gejala yang sesuai
            $matchedAturanForPenyakit = Aturan::where('penyakit_id', $penyakitItem->id)
                                              ->whereIn('gejala_id', $selectedGejalas)
                                              ->get();

            // Jika aturan ditemukan, hitung kecocokan
            if (!$matchedAturanForPenyakit->isEmpty()) {
                // Pastikan jumlah aturan yang cocok sesuai dengan jumlah gejala yang dipilih
                if ($matchedAturanForPenyakit->count() == count($selectedGejalas)) {
                    $penyakitGejalaMatchCount[$penyakitItem->id] = count($matchedAturanForPenyakit);
                }
            }
        }

        // Urutkan penyakit berdasarkan kecocokan gejala terbanyak
        arsort($penyakitGejalaMatchCount);
        $recommendedPenyakitId = key($penyakitGejalaMatchCount); // Penyakit dengan kecocokan terbanyak

        // Jika tidak ada penyakit yang cocok, beri notifikasi
        if (!$recommendedPenyakitId) {
            return redirect()->route('diagnosa.index')->with('error', 'Tidak ada penyakit yang cocok dengan gejala yang Anda pilih.');
        }

        // Ambil penyakit yang memiliki kecocokan terbanyak
        $recommendedPenyakit = Penyakit::find($recommendedPenyakitId);

        // Ambil gejala yang paling banyak cocok untuk penyakit yang ditemukan
        $matchedAturan = Aturan::where('penyakit_id', $recommendedPenyakit->id)
                               ->whereIn('gejala_id', $selectedGejalas)
                               ->get();

        // Ambil gejala terkait
        $gejalaTerkait = [];
        foreach ($matchedAturan as $aturanItem) {
            $gejalaTerkait[] = $aturanItem->gejala->nama;
        }

        // Ambil saran terkait penyakit ini
        $saran = $recommendedPenyakit->saran;

        // Kirimkan hasil diagnosa dan saran ke tampilan
        return view('diagnosa.result', compact('recommendedPenyakit', 'gejalaTerkait', 'saran'));
    }

}
