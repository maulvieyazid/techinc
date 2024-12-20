<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    /**
     * Note: Untuk Copas Image Dari Aplikasi Lain seperti Power Point, Visio, dll, 
     * akan selalu menampilkan gambar yang sama
     * karena nama image yang diupload itu sama secara default yaitu image.png, 
     * sehingga akan selalu menampilkan gambar yang sama
     * 
     * Future Fix: Generate nama file random, untuk membedakan nama image di upload
     * 
     * Risk: Meningkatkan sampah file image di server apabila image nya tidak terpakai 
     * dan image tersebut isinya redundan
     */
    public function uploadImagesCkeditor(Request $request)
    {
        $file = $request->upload;
        $namafile = $file->getClientOriginalName();
        $ukuran = (int) $file->getSize();

        # Jika Gambar melebihi 5 MB, maka kembalikan pesan error
        if ($ukuran > 6291456) {
            return response()->json([
                'error' => [
                    'message' => 'Gambar tidak boleh lebih dari 5 MB'
                ]
            ]);
        }

        # Cek apakah gambar sudah ada di server
        $exists = Storage::disk('image_ckeditor')->exists($namafile);

        # Kalo belum ada
        if (!$exists) {
            /** Simpan file ke Disk
             * note: konfigurasi disk 'image_ckeditor' dapat dilihat pada config/filesystems.php
             */
            Storage::disk('image_ckeditor')->putFileAs(null, $file, $namafile);
        }

        # Generate URL untuk file
        $url = asset('upload/ckeditor/'.$namafile);

        return response()->json([
            'url' => $url
        ]);
    }
}
