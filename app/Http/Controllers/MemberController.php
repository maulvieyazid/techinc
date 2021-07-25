<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    private $pathFoto;

    public function __construct()
    {
        $this->pathFoto = Member::$pathFoto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaMember = Member::latest()->get();
        return view('member.index', compact('semuaMember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaMember = collect($request->member);

        $semuaMember->transform(function ($item, $key) {
            $item = collect($item);

            /** Kalo ada fotonya */
            if ($item->has('foto')) {

                $foto = $item->get('foto');
                $namafile = $this->getNamaFile($foto);

                /** Simpan Foto ke Disk
                 * note: konfigurasi disk 'foto_member' dapat dilihat pada config/filesystems.php
                 */
                Storage::disk('foto_member')->putFileAs(null, $foto, $namafile);

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

        Member::insert($semuaMember->toArray());

        return redirect()->route('member.index')->with('success', 'Data Member Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $foto = $request->foto;

        /** Kalo ada thumbnailnya */
        if ($foto) {
            $namafile = $this->getNamaFile($foto);

            /** Hapus File Foto dari Folder Public */
            Storage::delete($member->foto);

            /** Simpan Foto ke Disk
             * note: konfigurasi disk 'foto_member' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('foto_member')->putFileAs(null, $foto, $namafile);

            /** Insert Foto */
            $member->foto = $this->getPathFoto($namafile);
        }

        $member->nama_member = $request->nama_member;
        $member->status      = $request->status;
        $member->deskripsi   = $request->deskripsi;
        $member->save();

        return redirect()->route('member.index')->with('success', 'Data Member Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        /** Hapus Foto dari Folder Public */
        Storage::delete($member->foto);

        $member->delete();

        return redirect()->route('member.index')->with('success', 'Data Member Berhasil Dihapus');
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
