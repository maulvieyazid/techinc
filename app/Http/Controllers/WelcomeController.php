<?php

namespace App\Http\Controllers;

use App\About;
use App\CarouselImage;
use App\Document;
use App\Event;
use App\Fasilitas;
use App\Galeri;
use App\Kategori;
use App\KategoriNews;
use App\Member;
use App\News;
use App\Partner;
use App\Program;
use App\Registrasi;
use Illuminate\Http\Request;
use App\Startup;
use App\TimStartup;

class WelcomeController extends Controller
{
    public function index()
    {
        $allCarouselImage = CarouselImage::orderBy('urutan', 'asc')->get();
        $allStartup = Startup::latest()->get();
        $allNews = News::latest()->take(2)->get();
        $allEvent = Event::where('tanggal_selesai', '>=', date('Y-m-d H:i:s'))->take(2)->get();
        $allKategori = Kategori::latest()->take(3)->get();
        $allPartner = Partner::latest()->get();
        return view('welcome', compact(
            'allCarouselImage',
            'allStartup',
            'allNews',
            'allEvent',
            'allKategori',
            'allPartner'
        ));
    }

    public function about()
    {
        $allMember = Member::with('jenisMember')->aktif()->get();
        $about = About::first();

        return view('about', compact('allMember', 'about'));
    }

    public function program()
    {
        $semuaProgram = Program::orderBy('urutan', 'asc')->get();

        return view('program', compact('semuaProgram'));
    }

    public function facilities()
    {
        $semuaFasilitas = Fasilitas::orderBy('urutan', 'asc')->get();

        return view('facilities', compact('semuaFasilitas'));
    }

    public function news(Request $request)
    {
        $kategori = $request->input('kategori');

        $allKategori = KategoriNews::orderBy('nama_kategori', 'asc')->get();

        $allNews = News::query()
            ->when($kategori, function ($query, $kategori) {
                return $query->where('slug_kategori', $kategori);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('news', compact('allNews', 'allKategori', 'kategori'));
    }

    public function detailNews(News $news)
    {
        $otherNews = News::where('slug', '!=', $news->slug)->latest()->take(5)->get();

        return view('detailNews', compact('news', 'otherNews'));
    }

    public function galeri()
    {
        $allKategori = Kategori::latest()->get();

        return view('galeri', compact('allKategori'));
    }

    public function detailGaleri($slug_kategori)
    {
        $kategori = Kategori::findOrFail($slug_kategori);
        $allGaleri = Galeri::where('slug_kategori', $slug_kategori)->get();

        return view('detailGaleri', compact('allGaleri', 'kategori'));
    }

    public function event()
    {
        $allEvent = Event::latest()->paginate(6);
        return view('event', compact('allEvent'));
    }

    public function detailEvent(Event $event)
    {
        // $otherEvent = Event::where('slug', '!=', $event->slug)->latest()->take(5)->get();
        return view('detailEvent', compact('event'));
    }

    public function registrasi()
    {
        $allRegistrasi = Registrasi::latest()->paginate(6);
        return view('registrasi', compact('allRegistrasi'));
    }

    public function detailRegistrasi(Registrasi $registrasi)
    {
        return view('detailRegistrasi', compact('registrasi'));
    }

    public function join()
    {
        # Ambil Registrasi yang sedang buka
        $registrasi = Registrasi::where('tanggal_mulai', '<=', date('Y-m-d H:i:s'))
            ->where('tanggal_selesai', '>=', date('Y-m-d H:i:s'))
            ->get();

        # Jika ditemukan 1 registrasi yang sedang buka, maka redirect ke detail registrasi tsb
        if ($registrasi->count() == 1) {
            return redirect()->route('detail.registrasi', ['registrasi' => $registrasi[0]->slug]);
        }

        # Jika tidak ada / lebih dari 1 registrasi yang sedang buka, maka redirect ke list semua registrasi
        return redirect()->route('all.registrasi');
    }

    public function startup()
    {
        $allStartup = Startup::latest()->get();
        return view('startup', compact('allStartup'));
    }

    public function detailStartup(Startup $startup)
    {
        $timStartup = TimStartup::where('slug_startup', $startup->slug)->aktif()->get();
        return view('detailStartup', compact('startup', 'timStartup'));
    }

    public function document()
    {
        $allDocument = Document::latest()->get();
        return view('document', compact('allDocument'));
    }
}
