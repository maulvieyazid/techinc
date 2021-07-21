<?php

namespace App\Http\Controllers;

use App\Startup;
use App\TimStartup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class TimStartupController extends Controller
{
    private $pathFoto;

    public function __construct()
    {
        $this->pathFoto = TimStartup::$pathFoto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaTimStartup = TimStartup::latest()->get();
        return view('tim-startup.index', compact('semuaTimStartup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semuaStartup = Startup::latest()->get();
        return view('tim-startup.create', compact('semuaStartup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaTimStartup = collect($request->tim);

        $semuaTimStartup->transform(function ($item, $key) {
            $item = collect($item);

            /** Kalo ada fotonya */
            if ($item->has('foto')) {

                $foto = $item->get('foto');
                $namafile = $this->getNamaFile($foto);

                /** Simpan Foto ke Disk
                 * note: konfigurasi disk 'tim_startup' dapat dilihat pada config/filesystems.php
                 */
                Storage::disk('tim_startup')->putFileAs(null, $foto, $namafile);

                /** Insert Foto */
                $item->put('foto', $this->getPathFoto($namafile));
            }
            /** Kalo gk ada fotonya */
            else{
                # Tambahkan key foto dengan value null
                $item->put('foto', null);
            }
            return $item->toArray();
        });

        TimStartup::insert($semuaTimStartup->toArray());

        return redirect()->route('tim-startup.index')->with('success', 'Data Tim Startup Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimStartup  $timStartup
     * @return \Illuminate\Http\Response
     */
    public function show(TimStartup $timStartup)
    {
        return view('tim-startup.show', compact('timStartup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimStartup  $timStartup
     * @return \Illuminate\Http\Response
     */
    public function edit(TimStartup $timStartup)
    {
        $semuaStartup = Startup::latest()->get();
        return view('tim-startup.edit', compact('timStartup', 'semuaStartup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimStartup  $timStartup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimStartup $timStartup)
    {
        $foto = $request->foto;

        /** Kalo ada thumbnailnya */
        if ($foto) {
            $namafile = $this->getNamaFile($foto);

            /** Hapus File Foto dari Folder Public */
            Storage::delete($timStartup->foto);

            /** Simpan Foto ke Disk
             * note: konfigurasi disk 'tim_startup' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('tim_startup')->putFileAs(null, $foto, $namafile);

            /** Insert Foto */
            $timStartup->foto = $this->getPathFoto($namafile);
        }

        $timStartup->nama         = $request->nama;
        $timStartup->posisi       = $request->posisi;
        $timStartup->slug_startup = $request->slug_startup;
        $timStartup->save();

        return redirect()->route('tim-startup.index')->with('success', 'Data Tim Startup Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimStartup  $timStartup
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimStartup $timStartup)
    {
        /** Hapus Foto dari Folder Public */
        Storage::delete($timStartup->foto);

        $timStartup->delete();

        return redirect()->route('tim-startup.index')->with('success', 'Data Tim Startup Berhasil Dihapus');
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
