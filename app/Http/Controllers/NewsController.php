<?php

namespace App\Http\Controllers;

use App\KategoriNews;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    private $pathThumbnail;

    public function __construct()
    {
        $this->pathThumbnail = News::$pathThumbnail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaNews = News::latest()->get();
        return view('news.index', compact('semuaNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semuaKategoriNews = KategoriNews::latest()->get();
        return view('news.create', compact('semuaKategoriNews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;
        $thumbnail = $request->thumbnail;

        /** Kalo ada thumbnailnya */
        if ($thumbnail) {
            $namafile = $this->getNamaFile($thumbnail);

            /** Simpan Foto ke Disk
             * note: konfigurasi disk 'thumbnail_news' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('thumbnail_news')->putFileAs(null, $thumbnail, $namafile);

            /** Insert Foto */
            $news->thumbnail = $this->getPathThumbnail($namafile);
        }

        $news->judul         = $request->judul;
        $news->deskripsi     = $request->deskripsi;
        $news->slug_kategori = $request->slug_kategori;
        $news->save();

        return redirect()->route('news.index')->with('success', 'Data News Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $semuaKategoriNews = KategoriNews::latest()->get();
        return view('news.edit', compact('news', 'semuaKategoriNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $thumbnail = $request->thumbnail;

        /** Kalo ada thumbnailnya */
        if ($thumbnail) {
            $namafile = $this->getNamaFile($thumbnail);

            /** Hapus File Foto dari Folder Public */
            Storage::delete($news->thumbnail);

            /** Simpan Foto ke Disk */
            Storage::disk('thumbnail_news')->putFileAs(null, $thumbnail, $namafile);

            /** Update Foto */
            $news->thumbnail = $this->getPathThumbnail($namafile);
        }

        $news->judul         = $request->judul;
        $news->deskripsi     = $request->deskripsi;
        $news->slug_kategori = $request->slug_kategori;
        $news->save();

        return redirect()->route('news.index')->with('success', 'Data News Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        /** Hapus Thumbnail dari Folder Public */
        Storage::delete($news->thumbnail);

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Data News Berhasil Dihapus');
    }

    private function getPathThumbnail($namafile)
    {
        return "{$this->pathThumbnail}/{$namafile}";
    }

    /** Tambahkan string random pada nama file untuk menghindari duplikasi nama */
    private function getNamaFile($file)
    {
        return pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
    }
}
