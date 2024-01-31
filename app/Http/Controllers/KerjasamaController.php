<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Kerjasama;

class KerjasamaController extends Controller
{
    public function simpanKerjasama(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nowa' => 'required',
            'kategori' => 'required',
            'pesan' => 'required',
            // Validasi untuk kolom-kolom lainnya
        ]);

        $kerjasama = Kerjasama::create($validatedData);

        Session::flash('success', 'Data Sudah Kami Terima, Segera Kami Hubungi Anda!');

        return redirect('/kontak');
    }
    public function index()
    {
        $kerjasama = Kerjasama::where('id', auth()->user()->id)->get();
        $kerjasama = Kerjasama::orderBy('created_at', 'desc')->get();
        return view('dashboard.kerjasama.index', ['kerjasama' => $kerjasama]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3',
            'nowa' => 'required',
            'kategori' => 'required',
            'pesan' => 'required',
        ]);

        $kerjasama = new Kerjasama;
        $kerjasama->nama = $request->nama;
        $kerjasama->nowa = $request->nowa;
        $kerjasama->kategori = $request->kategori;
        $kerjasama->pesan = $request->pesan;
        $kerjasama->save();

        return redirect('/admin/kerjasama')->with('status', 'Sukses Tambah Kerjasama');
    }

    public function delete($id)
    {
        $kerjasama_data = Kerjasama::find($id);
        
        $kerjasama_data->delete();

        return redirect('/admin/kerjasama')->with('status', 'Data Kerjasama Sukses Dihapus');
    }

    public function edit($id)
    {
        $kerjasama = Kerjasama::find($id);
        return view('dashboard.kerjasama.edit', ['kerjasama' => $kerjasama]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|min:3',
            'nowa' => 'required',
            'kategori' => 'required',
            'pesan' => 'required',
        ]);

        $kerjasama = Kerjasama::find($id);
        $kerjasama->nama = $request->nama;
        $kerjasama->nowa = $request->nowa;
        $kerjasama->kategori = $request->kategori;
        $kerjasama->pesan = $request->pesan;
        $kerjasama->save();


        return redirect('/admin/kerjasama')->with('status', 'Data Kerjasama Sukses Diubah');
    }
}
