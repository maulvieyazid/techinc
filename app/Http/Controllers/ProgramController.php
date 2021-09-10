<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaProgram = Program::orderBy('urutan', 'asc')->get();
        return view('program.index', compact('semuaProgram'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semuaProgram = collect($request->program);

        $semuaProgram->transform(function ($item, $key) {
            $item = collect($item);

            # Tambahkan key created_at dan updated_at
            $item->put('created_at', date('Y-m-d H:i:s'));
            $item->put('updated_at', date('Y-m-d H:i:s'));

            return $item->toArray();
        });

        Program::insert($semuaProgram->toArray());

        return redirect()->route('program.index')->with('success', 'Data Program Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        return view('program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $program->urutan    = $request->urutan;
        $program->tahap     = $request->tahap;
        $program->deskripsi = $request->deskripsi;
        $program->save();

        return redirect()->route('program.index')->with('success', 'Data Program Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('program.index')->with('success', 'Data Program Berhasil Dihapus');
    }
}
