<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::where('users_id', auth()->user()->id)->get();
        $artikel = Artikel::orderBy('created_at', 'desc')->get();
        return view('dashboard.artikel.index', ['artikel' => $artikel]);
    }

    public function add(Request $request)
    {
        \Log::info('Sebelum validasi', $request->all());
        $this->validate($request, [
            'judul' => 'required',
            'kategori' => 'required',
            'isi' => 'required',
            'isi2' => 'required',
            'isi3' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jfif,,jpg,png,gif',
        ]);
        \Log::info('Setelah validasi', $request->all());

        try {
            // Proses penyimpanan gambar
            $gambar = $request->file('gambar');
            $gambarNama = time() . '.' . $gambar->getClientOriginalExtension();
            $gambarPath = public_path('uploads') . '/' . $gambarNama;
    
            // Pindahkan gambar ke direktori uploads
            $gambar->move(public_path('uploads'), $gambarNama);
    
            // Manipulasi dan resize gambar
            $resizedImage = Image::make($gambarPath)->resize(300,300, function ($constraint) {
                $constraint->aspectRatio();
            });
    
            // Simpan gambar yang telah diresize
            $resizedImage->save($gambarPath);
            \Log::info('Setelah penyimpanan gambar', $request->all());
    
            // Proses penyimpanan data artikel
            $artikel = new Artikel;
            $artikel->users_id = auth()->user()->id;
            $artikel->judul = $request->judul;
            $artikel->kategori = $request->kategori;
            $artikel->isi = $request->isi;
            $artikel->isi2 = $request->isi2;
            $artikel->isi3 = $request->isi3;
            $artikel->gambar = $gambarNama;
            $artikel->save();
    
            \Log::info('Setelah penyimpanan artikel', $request->all());
    
        } catch (\Exception $e) {
            \Log::error('Error saat menyimpan data: ' . $e->getMessage());
        }
        return redirect('/admin/artikel')->with('status', 'Sukses Tambah Artikel');

        
        // dd($request->all()); // atau 
        var_dump($request->all());
    }

    public function delete($id)
    {
        $artikel_data = Artikel::find($id);
        
        $artikel_data->delete();

        return redirect('/admin/artikel')->with('status', 'Data Artikel Sukses Dihapus');
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('dashboard.artikel.edit', ['artikel' => $artikel]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'kategori' => 'required',
            'isi' => 'required',
            'isi2' => 'required',
            'isi3' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif', // Sesuaikan validasi gambar
        ]);

        // Menemukan artikel berdasarkan ID
        $artikel = Artikel::find($id);

        // Mengupdate data artikel
        $artikel->judul = $request->judul;
        $artikel->kategori = $request->kategori;
        $artikel->isi = $request->isi;
        $artikel->isi2 = $request->isi2;
        $artikel->isi3 = $request->isi3;

        // Memeriksa apakah ada gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // Proses penyimpanan dan update gambar
            $gambar = $request->file('gambar');
            $gambarNama = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads'), $gambarNama);
            // Proses resize gambar sebelum disimpan
            $resizedImage = Image::make(public_path('uploads') . '/' . $gambarNama)->resize(300,300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Simpan gambar yang telah diresize
            $resizedImage->save(public_path('uploads') . '/' . $gambarNama);

            $artikel->gambar = $gambarNama;
        }

        // Menyimpan perubahan pada database
        $artikel->save();

        return redirect('/admin/artikel')->with('status', 'Data Artikel Sukses Diubah');
    }


    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $artikel = Artikel::where('users_id', auth()->user()->id)->get();
            return view('dashboard.artikel.filter', ['artikel' => $artikel]);
        } else {
            $artikel = Artikel::whereBetween('tanggal_artikel', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.artikel.filter', ['artikel' => $artikel, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }

    
}
