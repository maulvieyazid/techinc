<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->pathFoto = Partner::$pathFoto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaPartner = Partner::latest()->get();
        return view('partner.index', compact('semuaPartner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaPartner = collect($request->partner);

        $semuaPartner->transform(function ($item, $key) {
            $item = collect($item);

            /** Kalo ada fotonya */
            if ($item->has('foto')) {

                $foto = $item->get('foto');
                $namafile = $this->getNamaFile($foto);

                /** Simpan Foto ke Disk
                 * note: konfigurasi disk 'logo_partner' dapat dilihat pada config/filesystems.php
                 */
                Storage::disk('logo_partner')->putFileAs(null, $foto, $namafile);

                /** Ganti value dari key foto dengan path foto */
                $item->put('foto', $this->getPathFoto($namafile));
            }
            /** Kalo gk ada fotonya */
            else {
                # Tambahkan key foto dengan value null
                $item->put('foto', null);
            }

            # Tambahkan key created_at dan updated_at
            $item->put('created_at', date('Y-m-d H:i:s'));
            $item->put('updated_at', date('Y-m-d H:i:s'));

            return $item->toArray();
        });

        Partner::insert($semuaPartner->toArray());

        return redirect()->route('partner.index')->with('success', 'Data Partner Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $foto = $request->foto;

        /** Kalo ada fotonya */
        if ($foto) {
            $namafile = $this->getNamaFile($foto);

            /** Hapus File Foto dari Folder Public */
            Storage::delete($partner->foto);

            /** Simpan Foto ke Disk
             * note: konfigurasi disk 'logo_partner' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('logo_partner')->putFileAs(null, $foto, $namafile);

            /** Insert Foto */
            $partner->foto = $this->getPathFoto($namafile);
        }

        $partner->nama_partner = $request->nama_partner;
        $partner->save();

        return redirect()->route('partner.index')->with('success', 'Data Partner Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        /** Hapus Foto dari Folder Public */
        Storage::delete($partner->foto);

        $partner->delete();

        return redirect()->route('partner.index')->with('success', 'Data Partner Berhasil Dihapus');
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
