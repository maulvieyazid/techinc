<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    private $pathFoto;

    public function __construct()
    {
        $this->pathFoto = Event::$pathFoto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaEvent = Event::latest()->get();
        return view('event.index', compact('semuaEvent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;

        $foto = $request->foto;

        /** Kalo ada fotonya */
        if ($foto) {
            $namafile = $this->getNamaFile($foto);

            /** Simpan Foto ke Disk
             * note: konfigurasi disk 'foto_event' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('foto_event')->putFileAs(null, $foto, $namafile);

            /** Insert Foto */
            $event->foto = $this->getPathFoto($namafile);
        }

        $event->nama_event      = $request->nama_event;
        $event->tanggal_mulai   = $request->tanggal_mulai;
        $event->tanggal_selesai = $request->tanggal_selesai;
        $event->deskripsi       = $request->deskripsi;
        $event->save();

        return redirect()->route('event.index')->with('success', 'Data Event Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $foto = $request->foto;

        /** Kalo ada fotonya */
        if ($foto) {
            $namafile = $this->getNamaFile($foto);

            /** Hapus File Foto dari Folder Public */
            Storage::delete($event->foto);

            /** Simpan Foto ke Disk
             * note: konfigurasi disk 'foto_event' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('foto_event')->putFileAs(null, $foto, $namafile);

            /** Update Foto */
            $event->foto = $this->getPathFoto($namafile);
        }

        $event->nama_event      = $request->nama_event;
        $event->tanggal_mulai   = $request->tanggal_mulai;
        $event->tanggal_selesai = $request->tanggal_selesai;
        $event->deskripsi       = $request->deskripsi;
        $event->save();

        return redirect()->route('event.index')->with('success', 'Data Event Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        /** Hapus File Foto dari Folder Public */
        Storage::delete($event->foto);

        $event->delete();

        return redirect()->route('event.index')->with('success', 'Data Event Berhasil Dihapus');
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
