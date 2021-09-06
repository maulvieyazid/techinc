<?php

namespace App\Http\Controllers;

use App\Event;
use App\Galeri;
use App\Kategori;
use App\KategoriNews;
use App\Member;
use App\News;
use App\Partner;
use Illuminate\Http\Request;
use App\Startup;

class WelcomeController extends Controller
{
    public function index()
    {
        $allStartup = Startup::all();
        $allNews = News::orderBy('created_at', 'desc')->take(2)->get();
        $allEvent = Event::where('tanggal_selesai', '>=', date('Y-m-d H:i:s'))->get();
        $allKategori = Kategori::all();
        $allPartner = Partner::all();
        return view('welcome', compact('allStartup', 'allNews', 'allEvent', 'allKategori', 'allPartner'));
    }

    public function about()
    {
        $allMember = Member::with('jenisMember')->get();
        return view('about', compact('allMember'));
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
        $otherNews = News::where('slug', '!=', $news->slug)->orderBy('created_at', 'desc')->take(5)->get();
        return view('detailNews', compact('news', 'otherNews'));
    }

    public function detailGaleri($slug_kategori)
    {
        $kategori = Kategori::findOrFail($slug_kategori);
        $allGaleri = Galeri::where('slug_kategori', $slug_kategori)->get();
        return view('detailGaleri', compact('allGaleri', 'kategori'));
    }
}
