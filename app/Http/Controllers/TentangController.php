<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tentang;
use App\User;

class TentangController extends Controller
{
    public function index()
    {
    //     $user = auth()->user();

    // if ($user) {
        $tentang = Tentang::where('users_id', auth()->user()->id)->get();
        $tentang = Tentang::orderBy('created_at', 'desc')->get();
        return view('dashboard.tentang.index', ['tentang' => $tentang]);
    // } else {
    //     // Lakukan sesuatu jika user tidak terautentikasi
    //     return redirect()->route('login'); // Contoh redirect ke halaman login
    // }
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'tentang' => 'required|min:3',
            'judul' => 'required'
        ]);

        $tentang = new Tentang;
        $tentang->users_id = auth()->user()->id;
        $tentang->tentang = $request->tentang;
        $tentang->judul = $request->judul;

        $tentang->save();
        $user = User::find(auth()->user()->id);
        return redirect('/admin/tentang')->with('status', 'Sukses Tambah Tentang');
    }

    public function delete($id)
    {
        $tentang_data = Tentang::find($id);
        
        $tentang_data->delete();

        return redirect('/admin/tentang')->with('status', 'Data Tentang Sukses Dihapus');
    }

    public function edit($id)
    {
        $tentang = Tentang::find($id);
        return view('dashboard.tentang.edit', ['tentang' => $tentang]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tentang' => 'required|min:3',
            'judul' => 'required',
        ]);

        $tentang = Tentang::find($id);
        $tentang->tentang = $request->tentang;
        $tentang->judul = $request->judul;
        $tentang->save();

        $currentImage = $tentang_data->gambar;

        return redirect('/admin/tentang')->with('status', 'Data tentang Sukses Diubah');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $tentang = Tentang::where('users_id', auth()->user()->id)->get();
            return view('dashboard.tentang.filter', ['tentang' => $tentang]);
        } else {
            $tentang = Tentang::whereBetween('tanggal_tentang', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.tentang.filter', ['tentang' => $tentang, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }
}
