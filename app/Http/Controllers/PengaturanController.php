<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        $rek = Pengaturan::all();
        return view('auth.infobayar', ['rek' => $rek]);
    }
}
