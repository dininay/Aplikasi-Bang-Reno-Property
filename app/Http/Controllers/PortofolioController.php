<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portofolio;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolio = Portofolio::where('users_id', auth()->user()->id)->get();
        $portofolio = Portofolio::orderBy('created_at', 'desc')->get();
        return view('dashboard.portofolio.index', ['portofolio' => $portofolio]);
    }

    public function add(Request $request)
    {
        \Log::info('Sebelum validasi', $request->all());
        $this->validate($request, [
            'judul' => 'required',
            'kategori' => 'required',
            'portofolio' => 'required',
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
    
            // Proses penyimpanan data portofolio
            $portofolio = new Portofolio;
            $portofolio->users_id = auth()->user()->id;
            $portofolio->judul = $request->judul;
            $portofolio->kategori = $request->kategori;
            $portofolio->portofolio = $request->portofolio;
            $portofolio->gambar = $gambarNama;
            $portofolio->save();
    
            \Log::info('Setelah penyimpanan portofolio', $request->all());
    
        } catch (\Exception $e) {
            \Log::error('Error saat menyimpan data: ' . $e->getMessage());
        }
        return redirect('/admin/portofolio')->with('status', 'Sukses Tambah Portofolio');

        
        // dd($request->all()); // atau 
        var_dump($request->all());
    }


    public function delete($id)
    {
        $portofolio_data = Portofolio::find($id);
        
        $portofolio_data->delete();

        return redirect('/admin/portofolio')->with('status', 'Data Portofolio Sukses Dihapus');
    }

    public function edit($id)
    {
        $portofolio = Portofolio::find($id);
        return view('dashboard.portofolio.edit', ['portofolio' => $portofolio]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'kategori' => 'required',
            'portofolio' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif', // Sesuaikan validasi gambar
        ]);

        // Menemukan portofolio berdasarkan ID
        $portofolio = Portofolio::find($id);

        // Mengupdate data portofolio
        $portofolio->judul = $request->judul;
        $portofolio->kategori = $request->kategori;
        $portofolio->portofolio = $request->portofolio;

        // Memeriksa apakah ada gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // Proses penyimpanan dan update gambar
            $gambar = $request->file('gambar');
            $gambarNama = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads'), $gambarNama);
            // Proses resize gambar sebelum disimpan
            $resizedImage = Image::make(public_path('uploads') . '/' . $gambarNama)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Simpan gambar yang telah diresize
            $resizedImage->save(public_path('uploads') . '/' . $gambarNama);

            $portofolio->gambar = $gambarNama;
        }

        // Menyimpan perubahan pada database
        $portofolio->save();

        return redirect('/admin/portofolio')->with('status', 'Data Portofolio Sukses Diubah');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $portofolio = Portofolio::where('users_id', auth()->user()->id)->get();
            return view('dashboard.portofolio.filter', ['portofolio' => $portofolio]);
        } else {
            $portofolio = Portofolio::whereBetween('tanggal_portofolio', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.portofolio.filter', ['portofolio' => $portofolio, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }
}