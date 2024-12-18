<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('penyakit.index', compact('penyakits'));
    }

    public function create()
    {
        return view('penyakit.create');
    }

    public function store(Request $request)
    {
        Penyakit::create($request->all());
        return redirect()->route('penyakit.index');
    }

    public function edit(Penyakit $penyakit)
    {
        return view('penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        $penyakit->update($request->all());
        return redirect()->route('penyakit.index');
    }

    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        return redirect()->route('penyakit.index');
    }
}
