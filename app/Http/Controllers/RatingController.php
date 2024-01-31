<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use App\User;

class RatingController extends Controller
{
    public function index()
    {
        $rating = Rating::where('users_id', auth()->user()->id)->get();
        $rating = Rating::orderBy('created_at', 'desc')->get();
        return view('dashboard.rating.index', ['rating' => $rating]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required|min:3',
            'tempat' => 'required',
        ]);
        $rating = new Rating;
        $rating->users_id = auth()->user()->id;
        $rating->rating = $request->rating;
        $rating->tempat = $request->tempat;
        $rating->save();

        return redirect('/admin/rating')->with('status', 'Sukses Tambah Rating');
    }

    public function delete($id)
    {
        $rating_data = Rating::find($id);
        
        $rating_data->delete();

        return redirect('/admin/rating')->with('status', 'Data Rating Sukses Dihapus');
    }

    public function edit($id)
    {
        $rating = Rating::find($id);
        return view('dashboard.rating.edit', ['rating' => $rating]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'rating' => 'required|min:3',
            'tempat' => 'required',
        ]);

        $rating = Rating::find($id);
        $rating->rating = $request->rating;
        $rating->tempat = $request->tempat;
        $rating->save();


        return redirect('/admin/rating')->with('status', 'Data Rating Sukses Diubah');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $rating = Rating::where('users_id', auth()->user()->id)->get();
            return view('dashboard.rating.filter', ['rating' => $rating]);
        } else {
            $rating = Rating::whereBetween('tanggal_rating', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.rating.filter', ['rating' => $rating, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }
}