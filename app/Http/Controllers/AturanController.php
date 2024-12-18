<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class AturanController extends Controller
{
    public function index()
    {
        $aturans = Aturan::with(['penyakit', 'gejala'])->get();
        return view('aturan.index', compact('aturans'));
    }

    
    public function create()
    {
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();
        return view('aturan.create', compact('penyakits', 'gejalas'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakits,id',
            'gejala_id' => 'required|exists:gejalas,id',
        ]);

        Aturan::create([
            'penyakit_id' => $request->penyakit_id,
            'gejala_id' => $request->gejala_id,
        ]);

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil ditambahkan');
    }

    
    public function edit($id)
    {
        $aturan = Aturan::findOrFail($id);
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();
        return view('aturan.edit', compact('aturan', 'penyakits', 'gejalas'));
    }

    
    public function update(Request $request, $id)
    {
        $aturan = Aturan::findOrFail($id);

        $request->validate([
            'penyakit_id' => 'required|exists:penyakit,id',
            'gejala_id' => 'required|exists:gejalas,id',
        ]);

        $aturan->update([
            'penyakit_id' => $request->penyakit_id,
            'gejala_id' => $request->gejala_id,
        ]);

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil diperbarui');
    }

    
    public function destroy($id)
    {
        $aturan = Aturan::findOrFail($id);
        $aturan->delete();

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil dihapus');
    }
}
