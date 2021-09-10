<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->pathFile = Document::$pathFile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaDocument = Document::latest()->get();
        return view('document.index', compact('semuaDocument'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaDocument = collect($request->document);

        $semuaDocument->transform(function ($item, $key) {
            $item = collect($item);

            $file = $item->get('file');
            $namafile = $this->getNamaFile($file);

            /** Simpan File ke Disk
             * note: konfigurasi disk 'file_dokumen' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('file_dokumen')->putFileAs(null, $file, $namafile);

            /** Ganti value dari key file dengan path file */
            $item->put('file', $this->getPathFile($namafile));

            # Tambahkan key created_at dan updated_at
            $item->put('created_at', date('Y-m-d H:i:s'));
            $item->put('updated_at', date('Y-m-d H:i:s'));

            return $item->toArray();
        });

        Document::insert($semuaDocument->toArray());

        return redirect()->route('document.index')->with('success', 'Data Document Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('document.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $file = $request->file;

        /** Kalo ada filenya */
        if ($file) {
            $namafile = $this->getNamaFile($file);

            /** Hapus File Foto dari Folder Public */
            Storage::delete($document->file);

            /** Simpan File ke Disk
             * note: konfigurasi disk 'file_dokumen' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('file_dokumen')->putFileAs(null, $file, $namafile);

            /** Insert File */
            $document->file = $this->getPathFile($namafile);
        }

        $document->nama_document = $request->nama_document;
        $document->save();

        return redirect()->route('document.index')->with('success', 'Data Document Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        /** Hapus File dari Folder Public */
        Storage::delete($document->file);

        $document->delete();

        return redirect()->route('document.index')->with('success', 'Data Document Berhasil Dihapus');
    }

    public function showFile(Document $document)
    {
        /** Menampilkan file dari local ke browser */
        /** Menghilangkan path folder document pada file document
         * note: fungsinya untuk mengambil nama filenya aja buat ditaruh di Content-Disposition
         */
        $namafile = Str::replaceFirst("{$this->pathFile}/", "", $document->file);

        /** Harus ditambahkan header agar selalu menampilkan ke browser
         * note: 'no-cache' diperlukan agar browser selalu update jika file diubah
         */
        return response()->file(public_path($document->file), [
            // 'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $namafile . '"',
            'Cache-Control'       => 'no-cache'
        ]);

    }

    public function downloadFile(Document $document)
    {
        /** Mendownload file dari local */
        return response()->download(public_path($document->file));
    }

    private function getPathFile($namafile)
    {
        return "{$this->pathFile}/{$namafile}";
    }

    /** Tambahkan string random pada nama file untuk menghindari duplikasi nama */
    private function getNamaFile($file)
    {
        return pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
    }
}
