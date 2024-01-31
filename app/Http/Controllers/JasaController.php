<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jasa;
use App\User;

class JasaController extends Controller
{
    public function index()
    {
        $jasa = Jasa::where('users_id', auth()->user()->id)->get();
        $jasa = Jasa::orderBy('created_at', 'desc')->get();
        return view('dashboard.jasa.index', ['jasa' => $jasa]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'jasa' => 'required|min:3',
            'harga' => 'required|min:3',
            'detail' => 'required',
        ]);

        $jasa = new Jasa;
        $jasa->users_id = auth()->user()->id;
        $jasa->jasa = $request->jasa;
        $jasa->harga = $request->harga;
        $jasa->detail = $request->detail;
        $jasa->save();

        return redirect('/admin/jasa')->with('status', 'Sukses Tambah Jasa');
    }

    public function delete($id)
    {
        $jasa_data = Jasa::find($id);
        
        $jasa_data->delete();

        return redirect('/admin/jasa')->with('status', 'Data Jasa Sukses Dihapus');
    }

    public function edit($id)
    {
        $jasa = Jasa::find($id);
        return view('dashboard.jasa.edit', ['jasa' => $jasa]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jasa' => 'required|min:3',
            'harga' => 'required|min:3',
            'detail' => 'required',
        ]);

        $jasa = Jasa::find($id);
        $jasa->jasa = $request->jasa;
        $jasa->harga = $request->harga;
        $jasa->detail = $request->detail;
        $jasa->save();


        return redirect('/admin/jasa')->with('status', 'Data Jasa Sukses Diubah');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $jasa = Jasa::where('users_id', auth()->user()->id)->get();
            return view('dashboard.jasa.filter', ['jasa' => $jasa]);
        } else {
            $jasa = Jasa::whereBetween('tanggal_jasa', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.jasa.filter', ['jasa' => $jasa, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }
}
