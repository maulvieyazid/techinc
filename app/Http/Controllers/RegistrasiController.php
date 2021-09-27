<?php

namespace App\Http\Controllers;

use App\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegistrasiController extends Controller
{
    public function __construct()
    {
        $this->pathFoto = Registrasi::$pathFoto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaRegistrasi = Registrasi::latest()->get();
        return view('registrasi.index', compact('semuaRegistrasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registrasi = new Registrasi;

        $semuaFoto = $request->foto;
        $folder = Str::slug(Str::lower($request->judul));

        # Kalo ada fotonya
        if ($semuaFoto) {
            foreach ($semuaFoto as $foto) {
                $namafile = $this->getNamaFile($foto);

                /** Simpan Foto ke Disk
                 * note: konfigurasi disk 'foto_registrasi' dapat dilihat pada config/filesystems.php
                 */
                Storage::disk('foto_registrasi')->putFileAs($folder, $foto, $namafile);
            }
        }

        $registrasi->judul           = $request->judul;
        $registrasi->tanggal_mulai   = $request->tanggal_mulai;
        $registrasi->tanggal_selesai = $request->tanggal_selesai;
        $registrasi->deskripsi       = $request->deskripsi;
        $registrasi->link_daftar     = $request->link_daftar;
        $registrasi->folder          = $folder;

        $registrasi->save();

        return redirect()->route('registrasi.index')->with('success', 'Data Registrasi Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Registrasi $registrasi)
    {
        return view('registrasi.show', compact('registrasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrasi $registrasi)
    {
        return view('registrasi.edit', compact('registrasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrasi $registrasi)
    {
        $semuaFoto = $request->foto;

        /** Kalo ada fotonya */
        if ($semuaFoto) {
            /** Hapus Folder registrasi dari Folder Public */
            Storage::disk('foto_registrasi')->deleteDirectory($registrasi->folder);

            foreach ($semuaFoto as $foto) {
                $namafile = $this->getNamaFile($foto);

                /** Simpan Foto ke Disk
                 * note: konfigurasi disk 'foto_registrasi' dapat dilihat pada config/filesystems.php
                 */
                Storage::disk('foto_registrasi')->putFileAs($registrasi->folder, $foto, $namafile);
            }
        }

        $registrasi->judul           = $request->judul;
        $registrasi->tanggal_mulai   = $request->tanggal_mulai;
        $registrasi->tanggal_selesai = $request->tanggal_selesai;
        $registrasi->deskripsi       = $request->deskripsi;
        $registrasi->link_daftar     = $request->link_daftar;
        $registrasi->save();

        return redirect()->route('registrasi.index')->with('success', 'Data Registrasi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrasi $registrasi)
    {
        /** Hapus Folder Registrasi dari Folder Public */
        Storage::disk('foto_registrasi')->deleteDirectory($registrasi->folder);

        $registrasi->delete();

        return redirect()->route('registrasi.index')->with('success', 'Data Registrasi Berhasil Dihapus');
    }

    private function getPathFoto($namafile)
    {
        return "{$this->pathFoto}/{$namafile}";
    }

    /** Tambahkan string random pada nama file untuk menghindari duplikasi nama */
    private function getNamaFile($file)
    {
        return pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
    }
}
