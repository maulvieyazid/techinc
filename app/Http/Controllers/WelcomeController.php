<?php

namespace App\Http\Controllers;

use App\Event;
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
        $allNews = News::all();
        $allEvent = Event::where('tanggal_selesai', '>=', date('Y-m-d H:i:s'))->get();
        $allPartner = Partner::all();
        return view('welcome', compact('allStartup', 'allNews', 'allEvent', 'allPartner'));
    }

    public function about()
    {
        $allMember = Member::with('jenisMember')->get();
        return view('about', compact('allMember'));
    }

    public function detailNews()
    {
        return view('detailNews');
    }
}
