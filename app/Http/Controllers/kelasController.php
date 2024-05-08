<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Menampilkan semua kelas.
     */
    public function index()
    {
        $kls = Kelas::latest()->paginate(10);
        return view('kelas.index', compact('kls'));
    }

    /**
     * Menampilkan form untuk membuat kelas baru.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Menyimpan kelas baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => 'required|max:255',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit kelas.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Mengupdate kelas ke database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kelas' => 'required|max:255',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Menghapus kelas dari database.
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
