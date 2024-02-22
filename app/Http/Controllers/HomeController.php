<?php

namespace App\Http\Controllers;
use App\Home;
use App\Tentang;
use App\Keunggulan;
use App\Jasa;
use App\Kontak;
use App\Portofolio;
use App\Rating;
use App\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tentang = Tentang::all();
        $keunggulan = Keunggulan::all();
        $jasa = Jasa::all();
        $kontak = Kontak::all();
        $portofolio = Portofolio::all();
        $rating = Rating::all();
        $artikel = Artikel::all();
        
        $jasa = Jasa::orderBy('created_at', 'desc')->paginate(50);
        return view('home.index', compact('tentang', 'keunggulan', 'jasa', 'kontak', 'portofolio', 'rating', 'artikel'));
    }
    public function tentangView()
    {
        $tentang = Tentang::all();
        $keunggulan = Keunggulan::all();
        $rating = Rating::all();
        $kontak = Kontak::all();

        return view('home.tentang', compact('tentang', 'keunggulan', 'rating','kontak'));
    }

    public function keunggulanView()
    {
        $keunggulan = Keunggulan::all();
        $kontak = Kontak::all();
        return view('home.keunggulan', compact('keunggulan', 'kontak'));
    }

    public function ratingView()
    {
        $rating = Rating::all();
        $kontak = Kontak::all();
        return view('home.rating', compact('rating', 'kontak'));
    }

    public function jasaView()
    {
        $jasa = Jasa::all();
        $kontak = Kontak::all();
        $jasa = Jasa::orderBy('created_at', 'desc')->paginate(8);

        return view('home.jasa', compact('jasa', 'kontak'));
    }
    public function showJasa($id)
    {
        $jasa = Jasa::find($id);
        $kontak = Kontak::all();

        if (!$jasa) {
            // Jasa tidak ditemukan, mungkin hendak ditangani dengan redirect atau pesan error.
            return redirect()->route('jasa')->with('error', 'Jasa tidak ditemukan');
        }

        return view('home.showJasa', compact('jasa', 'kontak'));
    }

    public function kontakView()
    {
        $kontak = Kontak::all();
        return view('home.kontak', ['kontak' => $kontak]);
    }

    public function portofolioView()
    {
        $portofolio = Portofolio::all();
        $kontak = Kontak::all();

        $portofolio = Portofolio::orderBy('created_at', 'desc')->paginate(4);

        return view('home.portofolio', compact('portofolio', 'kontak'));
    }
    public function showPortofolio($id)
    {
        $portofolio = Portofolio::find($id);
        $kontak = Kontak::all();

        if (!$portofolio) {
            // Portofolio tidak ditemukan, mungkin hendak ditangani dengan redirect atau pesan error.
            return redirect()->route('portofolio')->with('error', 'Portofolio tidak ditemukan');
        }

        return view('home.showPortofolio', compact('portofolio', 'kontak'));
    }

    public function artikelView()
    {
        $artikel = Artikel::all();
        $kontak = Kontak::all();

        $artikel = Artikel::orderBy('created_at', 'desc')->paginate(4);

        return view('home.artikel', compact('artikel', 'kontak'));
    }
    public function showArtikel($id)
    {
        $artikel = Artikel::find($id);
        $kontak = Kontak::all();

        if (!$artikel) {
            // Artikel tidak ditemukan, mungkin hendak ditangani dengan redirect atau pesan error.
            return redirect()->route('artikel')->with('error', 'Artikel tidak ditemukan');
        }

        return view('home.showArtikel', compact('artikel', 'kontak'));
    }
    
    public function __construct()
    {
        $this->middleware('log.activity');
    }
}
