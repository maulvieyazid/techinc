<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function __construct()
    {
        $this->pathLogo = Fasilitas::$pathLogo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaFasilitas = Fasilitas::orderBy('urutan', 'asc')->get();
        return view('fasilitas.index', compact('semuaFasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaFasilitas = collect($request->fasilitas);

        $semuaFasilitas->transform(function ($item, $key) {
            $item = collect($item);

            /** Kalo ada logonya */
            if ($item->has('logo')) {

                $logo = $item->get('logo');
                $namafile = $this->getNamaFile($logo);

                /** Simpan logo ke Disk
                 * note: konfigurasi disk 'logo_fasilitas' dapat dilihat pada config/filesystems.php
                 */
                Storage::disk('logo_fasilitas')->putFileAs(null, $logo, $namafile);

                /** Ganti value dari key logo dengan path logo */
                $item->put('logo', $this->getPathLogo($namafile));
            }
            /** Kalo gk ada logonya */
            else {
                # Tambahkan key logo dengan value null
                $item->put('logo', null);
            }

            # Tambahkan key created_at dan updated_at
            $item->put('created_at', date('Y-m-d H:i:s'));
            $item->put('updated_at', date('Y-m-d H:i:s'));

            return $item->toArray();
        });

        Fasilitas::insert($semuaFasilitas->toArray());

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fasilitas  $fasilita
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilita)
    {
        $fasilitas = $fasilita;
        return view('fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fasilitas  $fasilita
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilita)
    {
        $fasilitas = $fasilita;
        return view('fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilita)
    {
        $fasilitas = $fasilita;
        $logo = $request->logo;

        /** Kalo ada logonya */
        if ($logo) {
            $namafile = $this->getNamaFile($logo);

            /** Hapus File logo dari Folder Public */
            Storage::delete($fasilitas->logo);

            /** Simpan logo ke Disk
             * note: konfigurasi disk 'logo_fasilitas' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('logo_fasilitas')->putFileAs(null, $logo, $namafile);

            /** Insert logo */
            $fasilitas->logo = $this->getPathLogo($namafile);
        }

        $fasilitas->urutan = $request->urutan;
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->save();

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilita)
    {
        $fasilitas = $fasilita;
        /** Hapus logo dari Folder Public */
        Storage::delete($fasilitas->logo);

        $fasilitas->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas Berhasil Dihapus');
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
