<?php

namespace App\Http\Controllers;

use App\KategoriNews;
use Illuminate\Http\Request;

class KategoriNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaKategoriNews = KategoriNews::latest()->get();
        return view('kategori-news.index', compact('semuaKategoriNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori-news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = new KategoriNews;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori-news.index')->with('success', 'Data Kategori News Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriNews  $kategoriNews
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriNews $kategoriNews)
    {
        return view('kategori-news.show', compact('kategoriNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriNews  $kategoriNews
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriNews $kategoriNews)
    {
        return view('kategori-news.edit', compact('kategoriNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriNews  $kategoriNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriNews $kategoriNews)
    {
        $kategoriNews->nama_kategori = $request->nama_kategori;
        $kategoriNews->save();

        return redirect()->route('kategori-news.index')->with('success', 'Data Kategori News Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriNews  $kategoriNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriNews $kategoriNews)
    {
        /** Hapus kategori */
        $kategoriNews->delete();

        return redirect()->route('kategori-news.index')->with('success', 'Data Kategori News Berhasil Dihapus');
    }
}
