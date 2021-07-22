<?php

namespace App\Http\Controllers;

use App\JenisMember;
use App\Member;
use App\RoleMember;
use Illuminate\Http\Request;

class RoleMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaRoleMember = RoleMember::with(['member', 'jenisMember'])->get();
        return view('role-member.index', compact('semuaRoleMember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semuaMember = Member::all();
        $semuaJenisMember = JenisMember::all();

        return view('role-member.create', compact('semuaMember', 'semuaJenisMember'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Ambil semua Role Di DB
        $roleMember = RoleMember::all();

        # Ambil semua Role dari inputan
        $semuaRoleMember = collect($request->role);

        # Buang inputan Role yang double
        $semuaRoleMember = $semuaRoleMember->unique(function ($item) {
            return $item['id_member'] . $item['id_jenis'];
        })->values();

        # Cek inputan role sudah ada di DB atau belum
        $semuaRoleMember = $semuaRoleMember->filter(function ($item, $key) use ($roleMember) {
            $cek = $roleMember->where('id_member', $item['id_member'])
                ->where('id_jenis', $item['id_jenis'])
                ->count();
            # Klo blm ada di DB, maka antrikan biar dimasukkan ke DB
            if ($cek == 0) {
                return $item;
            }

        });

        # Masukkan ke DB
        RoleMember::insert($semuaRoleMember->toArray());

        return redirect()->route('role-member.index')->with('success', 'Data Role Member Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id_member
     * @param  $id_jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_member, $id_jenis)
    {
        RoleMember::where('id_member', $id_member)
            ->where('id_jenis', $id_jenis)
            ->delete();

        return redirect()->route('role-member.index')->with('success', 'Data Role Member Berhasil Dihapus');
    }
}
