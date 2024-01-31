<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;
use App\User;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::where('users_id', auth()->user()->id)->get();
        $kontak = Kontak::orderBy('created_at', 'desc')->get();
        return view('dashboard.kontak.index', ['kontak' => $kontak]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'kontak' => 'required|min:3',
            'link' => 'required',
        ]);

        $kontak = new Kontak;
        $kontak->users_id = auth()->user()->id;
        $kontak->kontak = $request->kontak;
        $kontak->link = $request->link;
        $kontak->save();

        return redirect('/admin/kontak')->with('status', 'Sukses Tambah Kontak');
    }

    public function delete($id)
    {
        $kontak_data = Kontak::find($id);
        
        $kontak_data->delete();

        return redirect('/admin/kontak')->with('status', 'Data Kontak Sukses Dihapus');
    }

    public function edit($id)
    {
        $kontak = Kontak::find($id);
        return view('dashboard.kontak.edit', ['kontak' => $kontak]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kontak' => 'required|min:3',
            'link' => 'required',
        ]);

        $kontak = Kontak::find($id);
        $kontak->kontak = $request->kontak;
        $kontak->link = $request->link;
        $kontak->save();


        return redirect('/admin/kontak')->with('status', 'Data Kontak Sukses Diubah');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $kontak = Kontak::where('users_id', auth()->user()->id)->get();
            return view('dashboard.kontak.filter', ['kontak' => $kontak]);
        } else {
            $kontak = Kontak::whereBetween('tanggal_kontak', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.kontak.filter', ['kontak' => $kontak, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }
}
