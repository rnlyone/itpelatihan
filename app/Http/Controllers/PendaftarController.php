<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'foto' => 'mimes:png,jpg,jpeg|dimensions:ratio=3/4'
        ]);

        $imgName = $r->foto->getClientOriginalName() . '-' . time() . '.' . $r->foto->extension();
            $r->foto->move(public_path('image'), $imgName);
        try {
            Pendaftar::create([
                'jenis_pendaftar' => $r->jenis_pendaftar,
                'nama' => $r->nama,
                'nim_nips' => $r->nim_nips,
                'bid_pekerjaan' => $r->bid_pekerjaan,
                'fakultas' => $r->fakultas,
                'prodi' => $r->prodi,
                'agama' => $r->agama,
                'jk' => $r->jk,
                'tpt_lahir' => $r->tpt_lahir,
                'alamat' => $r->alamat,
                'email' => $r->email,
                'telepon' => $r->telepon,
                'foto' => $imgName,
                'id_pelatihan' => $r->id_pelatihan,
                'status' => 'belum_konfirmasi',
            ]);

            return back()->with('success', 'Pendaftaran Telah Berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', 'Pendaftaran Gagal Coba Lagi')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftar $pendaftar)
    {
        //
    }
}
