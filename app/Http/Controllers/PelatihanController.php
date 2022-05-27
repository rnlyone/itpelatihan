<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pendaftar;
use App\Models\Pengaturan;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pelatihandata = Pelatihan::all();

        if ($request->ajax()){
            return DataTables::of($pelatihandata)
            ->addColumn('action', function($data){
                $button = '
                <button data-toggle="modal" data-bs-toggle="modal" data-original-title="Edit" type="button" data-bs-target="#modaledit'.$data->id.'" type="button" class="edit-post btn btn-icon btn-success">
                    <i data-feather="edit-3"></i>
                </button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '
                <button data-toggle="modal" data-bs-toggle="modal" name="delete" data-original-title="delete" data-bs-target="#modaldel'.$data->id.'" type="button" class="delete btn btn-icon btn-outline-danger">
                    <i data-feather="trash-2"></i>
                </button>';
                $button .= '
                <a href="pelatihan/view/'.$data->id.'" data-original-title="look" class="look btn btn-icon btn-info">
                    <i data-feather="eye"></i>
                </a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
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
        // dd($r);
        $r->validate([
            'tgl_mulai' => [
                'after_or_equal:batas_daftar',
                'before_or_equal:tgl_akhir'
            ],
            'batas_daftar' => [
                'before_or_equal:tgl_mulai'
            ],
            'tgl_akhir' => [
                'after_or_equal:tgl_mulai'
            ],
            'foto' => 'mimes:png,jpg,jpeg|dimensions:min_width=800,min_height=550' //memvalidasi image yang diinputkan
        ]);

        $imgName = $r->foto->getClientOriginalName() . '-' . time() . '.' . $r->foto->extension();
            $r->foto->move(public_path('image'), $imgName);

        try {
            Pelatihan::create([
                'nama' => $r->nama,
                'deskripsi' => $r->deskripsi,
                'batas_daftar' => $r->batas_daftar,
                'tgl_mulai' => $r->tgl_mulai,
                'tgl_akhir' => $r->tgl_akhir,
                'kuota' => $r->kuota,
                'biaya' => $r->biaya,
                'foto' => $imgName,
                'id_kategori' => $r->id_kategori,
                'visible' => $r->visible,
                'id_rek' => $r->rekening,
            ]);

            return back()->with('success', 'Pelatihan Telah Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Pelatihan Gagal Ditambahkan'. $th)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(pelatihan $pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        $req->validate([
            'tgl_mulai' => [
                'after_or_equal:batas_daftar',
                'before_or_equal:tgl_akhir'
            ],
            'batas_daftar' => [
                'before_or_equal:tgl_mulai'
            ],
            'tgl_akhir' => [
                'after_or_equal:tgl_mulai'
            ] //memvalidasi image yang diinputkan
        ]);

        try {
            $imgName = $req->foto->getClientOriginalName() . '-' . time() . '.' . $req->foto->extension();
            $req->foto->move(public_path('image'), $imgName);
        } catch (\Throwable $th) {
            $imgName = null;
        }

        try {
            if ($imgName == null) {
                Pelatihan::where('id', $req->idedit)->update([
                    'nama' => $req->nama,
                    'deskripsi' => $req->deskripsi,
                    'batas_daftar' => $req->batas_daftar,
                    'tgl_mulai' => $req->tgl_mulai,
                    'tgl_akhir' => $req->tgl_akhir,
                    'kuota' => $req->kuota,
                    'biaya' => $req->biaya,
                    'id_kategori' => $req->id_kategori,
                    'visible' => $req->visible,
                    'id_rek' => $req->rekening
                ]);
            } else {
                $req->validate([
                    'foto' => 'mimes:png,jpg,jpeg|dimensions:min_width=800,min_height=550' //memvalidasi image yang diinputkan
                ]);
                Pelatihan::where('id', $req->idedit)->update([
                    'nama' => $req->nama,
                    'deskripsi' => $req->deskripsi,
                    'batas_daftar' => $req->batas_daftar,
                    'tgl_mulai' => $req->tgl_mulai,
                    'tgl_akhir' => $req->tgl_akhir,
                    'kuota' => $req->kuota,
                    'biaya' => $req->biaya,
                    'foto' => $imgName,
                    'id_kategori' => $req->id_kategori,
                    'visible' => $req->visible,
                    'id_rek' => $req->rekening
                ]);
            }
            return back()->with('success', 'Kriteria Berhasil Diedit.');
        } catch (Exception $e) {
            return back()->with('error', 'Maaf, ID Telah Tersedia');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pelatihan $pelatihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pendaftar::where('id_pelatihan', $id)->delete();
        Pelatihan::where('id', $id)->delete();
        return back()->with('success', 'Pelatihan Berhasil Dihapus.');
    }

    public function daftar($id)
    {
        // $id = 1;
        $pelatihanid = Pelatihan::where('visible', 1)->where('id', $id)->first();
        $pendaftar = Pendaftar::where('id_pelatihan', $id)->get();
        return view('daftar', ['pelatihanid' => $pelatihanid, 'pendaftar' => $pendaftar]);
    }

    public function indexpeserta($id)
    {
        $pelatihanid = Pelatihan::where('visible', 1)->where('id', $id)->first();
        $pendaftar = Pendaftar::where('id_pelatihan', $id)->get();
        return view('auth.listpeserta', ['pelatihanid' => $pelatihanid, 'pendaftar' => $pendaftar]);
    }

    public function terima($id)
    {
        $peserta = Pendaftar::where('id', $id)->first();
        $peserta->update([
            'status' => 'diterima'
        ]);
        return back()->with('success', 'Status Peserta "'.$peserta->nama.'" telah diubah');
    }

    public function tolak($id)
    {
        $peserta = Pendaftar::where('id', $id)->first();
        $peserta->update([
            'status' => 'ditolak'
        ]);
        return back()->with('success', 'Status Peserta "'.$peserta->nama.'" telah diubah');
    }
}
