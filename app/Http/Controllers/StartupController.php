<?php

namespace App\Http\Controllers;

use App\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StartupController extends Controller
{
    private $pathLogo;

    public function __construct()
    {
        $this->pathLogo = Startup::$pathLogo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaStartup = Startup::latest()->get();
        return view('startup.index', compact('semuaStartup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('startup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $startup = new Startup;
        $logo = $request->logo;

        /** Kalo ada thumbnailnya */
        if ($logo) {
            $namafile = $this->getNamaFile($logo);

            /** Simpan Foto ke Disk
             * note: konfigurasi disk 'logo_startup' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('logo_startup')->putFileAs(null, $logo, $namafile);

            /** Insert Foto */
            $startup->logo = $this->getPathlogo($namafile);
        }

        $startup->nama_startup   = $request->nama_startup;
        $startup->tanggal_gabung = $request->tanggal_gabung;
        $startup->tanggal_lulus  = $request->tanggal_lulus;
        $startup->deskripsi      = $request->deskripsi;
        $startup->save();

        return redirect()->route('startup.index')->with('success', 'Data Startup Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function show(Startup $startup)
    {
        return view('startup.show', compact('startup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function edit(Startup $startup)
    {
        return view('startup.edit', compact('startup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Startup $startup)
    {
        $logo = $request->logo;

        /** Kalo ada thumbnailnya */
        if ($logo) {
            $namafile = $this->getNamaFile($logo);

            /** Hapus File Foto dari Folder Public */
            Storage::delete($startup->logo);

            /** Simpan Foto ke Disk
             * note: konfigurasi disk 'logo_startup' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('logo_startup')->putFileAs(null, $logo, $namafile);

            /** Insert Foto */
            $startup->logo = $this->getPathlogo($namafile);
        }

        $startup->nama_startup   = $request->nama_startup;
        $startup->tanggal_gabung = $request->tanggal_gabung;
        $startup->tanggal_lulus  = $request->tanggal_lulus;
        $startup->deskripsi      = $request->deskripsi;
        $startup->save();

        return redirect()->route('startup.index')->with('success', 'Data Startup Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Startup $startup)
    {
        /** Hapus Logo dari Folder Public */
        Storage::delete($startup->logo);

        $startup->delete();

        return redirect()->route('startup.index')->with('success', 'Data Startup Berhasil Dihapus');
    }

    private function getPathLogo($namafile)
    {
        return "{$this->pathLogo}/{$namafile}";
    }

    /** Tambahkan string random pada nama file untuk menghindari duplikasi nama */
    private function getNamaFile($file)
    {
        return pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
    }
}
