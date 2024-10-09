<?php

namespace App\Http\Controllers;

use App\Models\Konten;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function index()
    {
        $kontens = Konten::all();
        return view('konten.index', compact('kontens'));
    }

    public function create()
    {
        return view('konten.create');
    }

    // Create
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Konten::create($request->all());
        return redirect()->route('konten.index')->with('success', 'Konten berhasil ditambahkan.');
    }

    // Read
    public function show(Konten $konten)
    {
        return view('konten.show', compact('konten'));
    }

    // Update
    public function edit(Konten $konten)
    {
        return view('konten.edit', compact('konten'));
    }

    public function update(Request $request, Konten $konten)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $konten->update($request->all());
        return redirect()->route('konten.index')->with('success', 'Konten berhasil diperbarui.');
    }

    // Delete
    public function destroy(Konten $konten)
    {
        $konten->delete();
        return redirect()->route('konten.index')->with('success', 'Konten berhasil dihapus.');
    }
}

