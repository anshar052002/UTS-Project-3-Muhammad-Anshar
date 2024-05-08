<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $siswa = Siswa::with('kelas')->latest()->paginate(10);
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kls = kelas::all();
        return view('siswa.create', compact('kls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|max:12',
            'nama' => 'required|max:20',
            'alamat' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email',
            'id_kelas' => 'required',
        ]);

        Siswa::create($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', ['siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $siswa = Siswa::findOrFail($id);
        $kls = Kelas::all(); 
    return view('siswa.edit', compact('siswa', 'kls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nis' => 'required|max:12',
            'nama' => 'required|max:20',
            'alamat' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email',
            'id_kelas' => 'required',
        ]);
    
        $siswa = Siswa::findOrFail($id);
        $siswa->update($validatedData);
    
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
    $siswa->delete();

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
