<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Startup;

class WelcomeController extends Controller
{
    public function index()
    {
        $allStartup = Startup::all();
        return view('welcome', compact('allStartup'));
    }
}
