<?php

namespace App\Http\Controllers;

use App\Models\Kategori as ModelsKategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;


class Kategori extends BaseController
{
    public function index()
    {
        $dataKategori = ModelsKategori::get();
        $countKategoriAktif = ModelsKategori::where('status_kat', 'active')->count();
        $countKategoriInactive = ModelsKategori::where('status_kat', 'inactive')->count();
        $data = [
            'kategori' => $dataKategori,
            'countActive' => $countKategoriAktif,
            'countInactive' => $countKategoriInactive
        ];
        return view('master.kategori', $data);
    }
    public function saveKategori(Request $request)
    {
        $rules = [
            'kategori'  => 'required',
            'status'    => 'required'
        ];

        $message = [
            'kategori.required'      => 'Nama kategori tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect('master/kategori')->withErrors($validator);
        }
        $modelKategori = new \App\Models\Kategori();
        $modelKategori->nama_kat   = $request->input('kategori');
        $modelKategori->status_kat  = $request->input('status');
        $modelKategori->save();

        Session::flash('message', 'Kategori berhasil ditambahkan');
        return redirect('master/kategori');
    }
    public function delete($id)
    {
        $modelKategori = ModelsKategori::find($id);
        $modelKategori->delete();

        Session::flash('message', 'Kategori berhasil dihapus');
        return redirect('master/kategori');
    }
    public function updateKategori(Request $request, $id)
    {
        $rules = [
            'kategori'  => 'required',
            'status'    => 'required'
        ];

        $message = [
            'kategori.required'      => 'Nama kategori tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect('master/kategori')->withErrors($validator);
        }
        $modelKategori = ModelsKategori::find($id);
        $modelKategori->nama_kat   = $request->input('kategori');
        $modelKategori->status_kat  = $request->input('status');
        $modelKategori->update();

        Session::flash('message', 'Kategori berhasil diupdate');
        return redirect('master/kategori');
    }
}
