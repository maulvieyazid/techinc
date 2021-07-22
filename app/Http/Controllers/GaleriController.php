<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->pathFoto = Galeri::$pathFoto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaGaleri = Galeri::with('kategori')->orderBy('slug_kategori')->get();
        return view('galeri.index', compact('semuaGaleri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semuaKategori = Kategori::all();
        return view('galeri.create', compact('semuaKategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaFile = collect($request->foto);

        $semuaFile->transform(function ($item, $key) use($request) {
            $type = explode('/', $item->getClientMimeType())[0];
            $namafile = $this->getNamaFile($item);

            if ($type == 'video') {
                $folder = $request->folder_kategori . '/video';
                $tipe = 1;
                Storage::disk('galeri')->putFileAs($folder, $item, $namafile);
            }
            else {
                $folder = $request->folder_kategori;
                $tipe = 2;
                Storage::disk('galeri')->putFileAs($folder, $item, $namafile);
            }
            $file = $folder . '/' . $namafile;

            $item = collect();
            $item->put('nama_file', $namafile);
            $item->put('file_galeri', $this->getPathFoto($file));
            $item->put('tipe', $tipe);
            $item->put('slug_kategori', $request->slug_kategori);
            $item->put('created_at', date('Y-m-d H:i:s'));
            $item->put('updated_at', date('Y-m-d H:i:s'));

            return $item->toArray();
        });

        Galeri::insert($semuaFile->toArray());
        return redirect()->route('galeri.index')->with('success', 'Data Galeri Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        /** Hapus File dari Folder Public */
        Storage::delete($galeri->file_galeri);

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data Galeri Berhasil Dihapus');
    }

    private function getPathFoto($namafile)
    {
        return $this->pathFoto . '/' . $namafile;
    }

    /** Tambahkan string random pada nama file untuk menghindari duplikasi nama */
    private function getNamaFile($file)
    {
        return pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
    }
}
