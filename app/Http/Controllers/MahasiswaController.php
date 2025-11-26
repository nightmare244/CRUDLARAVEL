<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create( [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
        ]);
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa->update( [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
        ]);
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa deleted successfully.');
    }
}
