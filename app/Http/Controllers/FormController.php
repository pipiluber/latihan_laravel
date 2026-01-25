<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // menampilkan tabel
    public function getTabel()
    {
        return view('table');
    }

    // menampilkan form
    public function getForm()
    {
        return view('form');
    }

    // proses form
    public function simpan(Request $request)
    {
        return view('tabel', [
            'nim'   => $request->nim,
            'nama'  => $request->nama,
            'kelas' => $request->kelas
        ]);
    }
}
