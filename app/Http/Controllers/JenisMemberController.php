<?php

namespace App\Http\Controllers;

use App\JenisMember;
use Illuminate\Http\Request;

class JenisMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaJenisMember = JenisMember::latest()->get();
        return view('jenis-member.index', compact('semuaJenisMember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaJenisMember = collect($request->jenis);

        $semuaJenisMember->transform(function ($item, $key) {
            $item = collect($item);

            # Tambahkan key created_at dan updated_at
            $item->put('created_at', date('Y-m-d H:i:s'));
            $item->put('updated_at', date('Y-m-d H:i:s'));

            return $item->toArray();
        });

        JenisMember::insert($semuaJenisMember->toArray());

        return redirect()->route('jenis-member.index')->with('success', 'Data Jenis Member Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisMember  $jenisMember
     * @return \Illuminate\Http\Response
     */
    public function show(JenisMember $jenisMember)
    {
        return view('jenis-member.show', compact('jenisMember'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisMember  $jenisMember
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisMember $jenisMember)
    {
        return view('jenis-member.edit', compact('jenisMember'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisMember  $jenisMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisMember $jenisMember)
    {
        $jenisMember->nama_jenis = $request->nama_jenis;
        $jenisMember->save();

        return redirect()->route('jenis-member.index')->with('success', 'Data Jenis Member Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisMember  $jenisMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisMember $jenisMember)
    {
        $jenisMember->delete();

        return redirect()->route('jenis-member.index')->with('success', 'Data Jenis Member Berhasil Dihapus');
    }
}
