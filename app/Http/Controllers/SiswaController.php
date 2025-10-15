<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::latest()->get();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        Siswa::create([
            'nama' => $request->get('nama'),
            'kelas' => $request->get('kelas'),
            'jurusan' => $request->get('jurusan'),
        ]);

        return redirect()->route('siswa.create')->with('message', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $siswa = Siswa::find($id);
        $siswa->update([
            'nama' => $request->get('nama'),
            'kelas' => $request->get('kelas'),
            'jurusan' => $request->get('jurusan'),
        ]);

        return redirect()->route('siswa.index')->with('message', 'Siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('message', 'Siswa berhasil dihapus');
    }
}