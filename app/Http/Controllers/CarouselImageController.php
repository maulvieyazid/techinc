<?php

namespace App\Http\Controllers;

use App\CarouselImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CarouselImageController extends Controller
{
    public function __construct()
    {
        $this->pathFoto = CarouselImage::$pathFoto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaCarousel = CarouselImage::orderBy('urutan', 'asc')->get();
        return view('carousel-image.index', compact('semuaCarousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousel-image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaCarousel = collect($request->carousel);

        $semuaCarousel->transform(function ($item, $key) {
            $item = collect($item);

            /** Kalo ada fotonya */
            if ($item->has('foto')) {

                $foto = $item->get('foto');
                $namafile = $this->getNamaFile($foto);

                /** Simpan Foto ke Disk
                 * note: konfigurasi disk 'carousel_image' dapat dilihat pada config/filesystems.php
                 */
                Storage::disk('carousel_image')->putFileAs(null, $foto, $namafile);

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

        CarouselImage::insert($semuaCarousel->toArray());

        return redirect()->route('carousel-image.index')->with('success', 'Data Carousel Image Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function show(CarouselImage $carouselImage)
    {
        $carousel = $carouselImage;
        return view('carousel-image.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function edit(CarouselImage $carouselImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarouselImage $carouselImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarouselImage $carouselImage)
    {
        /** Hapus Foto dari Folder Public */
        Storage::delete($carouselImage->foto);

        $carouselImage->delete();

        return redirect()->route('carousel-image.index')->with('success', 'Data Carousel Image Berhasil Dihapus');
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
