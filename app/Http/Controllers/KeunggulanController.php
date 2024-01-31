<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keunggulan;
use App\User;

class KeunggulanController extends Controller
{
    public function index()
    {
        $keunggulan = Keunggulan::where('users_id', auth()->user()->id)->get();
        $keunggulan = Keunggulan::orderBy('created_at', 'desc')->get();
        return view('dashboard.keunggulan.index', ['keunggulan' => $keunggulan]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'keunggulan' => 'required|min:3',
            'detail' => 'required'
        ]);
        $keunggulan = new Keunggulan;
        $keunggulan->users_id = auth()->user()->id;
        $keunggulan->keunggulan = $request->keunggulan;
        $keunggulan->detail = $request->detail;
        $keunggulan->save();

        return redirect('/admin/keunggulan')->with('status', 'Sukses Tambah Keunggulan');
    }

    public function delete($id)
    {
        $keunggulan_data = Keunggulan::find($id);
        
        $keunggulan_data->delete();

        return redirect('/admin/keunggulan')->with('status', 'Data Keunggulan Sukses Dihapus');
    }

    public function edit($id)
    {
        $keunggulan = Keunggulan::find($id);
        return view('dashboard.keunggulan.edit', ['keunggulan' => $keunggulan]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'keunggulan' => 'required|min:3',
            'detail' => 'required',
        ]);

        $keunggulan = Keunggulan::find($id);
        $keunggulan->keunggulan = $request->keunggulan;
        $keunggulan->detail = $request->detail;
        $keunggulan->save();


        return redirect('/admin/keunggulan')->with('status', 'Data Keunggulan Sukses Diubah');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $keunggulan = Keunggulan::where('users_id', auth()->user()->id)->get();
            return view('dashboard.keunggulan.filter', ['keunggulan' => $keunggulan]);
        } else {
            $keunggulan = Keunggulan::whereBetween('tanggal_keunggulan', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.keunggulan.filter', ['keunggulan' => $keunggulan, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }
}
