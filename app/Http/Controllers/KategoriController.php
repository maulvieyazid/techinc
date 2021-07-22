<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\Kategori;
use App\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaKategori = Kategori::with('startup')->latest()->get();
        return view('kategori.index', compact('semuaKategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semuaStartup = Startup::all();
        return view('kategori.create', compact('semuaStartup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori                  = new Kategori;
        $kategori->nama_kategori   = $request->nama_kategori;
        $kategori->slug_startup    = $request->slug_startup;
        $kategori->folder_kategori = Str::snake($request->folder_kategori);
        $kategori->save();

        /** Buat folder kosong */
        Storage::disk('galeri')->makeDirectory($kategori->folder_kategori);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $semuaStartup = Startup::all();
        return view('kategori.edit', compact('kategori', 'semuaStartup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug_startup  = $request->slug_startup;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        /** Hapus Folder Kategori pada Disk 'galeri' */
        Storage::disk('galeri')->deleteDirectory($kategori->folder_kategori);

        /** Hapus galeri foto */
        Galeri::where('slug_kategori', $kategori->slug)->delete();

        /** Hapus kategori */
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Dihapus');
    }
}
