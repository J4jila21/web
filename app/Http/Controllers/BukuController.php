<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|min:3',
            'pengarang' => 'required|min:3',
            'tahun_terbit' => 'required',
        ]);

        $buku = Buku::create($validated);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::all();
        $bukuDetail = Buku::find($id);
        return view('buku.index', compact('buku', 'bukuDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul' => 'required|min:3',
            'pengarang' => 'required|min:3',
            'tahun_terbit' => 'required',
        ]);

        $buku = Buku::find($id);
        $buku->update($validated);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bukuDetail = Buku::find($id);
        $bukuDetail->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
