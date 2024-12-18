<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        return view('gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('gejala.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //    'kode' => 'required:gejalas,kode',
        //    'nama' => 'required',
        // ]);
        // //simpan gejala
        // Gejala::create([
        //     'kode' => $request->kode,
        //     'nama' => $request->nama,
        // ]);
        Gejala::create($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        // $gejala = Gejala::findOrFail($id);

        // $request->validate([
        //     'kode' => 'required|unique:gejalas,kode,' . $gejala->id,
        //     'nama' => 'required',
        // ]);

        // $gejala->update([
        //     'kode' => $request->kode,
        //     'nama' => $request->nama,
        // ]);
        $gejala->update($request->all());
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui');
    }

    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil dihapus');
    }
}
