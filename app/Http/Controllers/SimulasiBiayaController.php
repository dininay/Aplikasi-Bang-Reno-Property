<?php

namespace App\Http\Controllers;
use App\User;
use App\LogActivity;
use App\Jasa;
use App\Http\Controllers\JasaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimulasiBiayaController extends Controller
{
    public function hitungBiaya(Request $request)
    {
        // Mengambil input dari formulir
        $panjang = $request->input('panjang');
        $lebar = $request->input('lebar');
        $idJasaTerpilih = $request->input('jenislayanan');

        // Mengambil data untuk jasa yang dipilih dari database
        $jasaTerpilih = Jasa::find($idJasaTerpilih);

        // Memeriksa apakah jasa yang dipilih ada
        if ($jasaTerpilih) {
            // Menghitung biaya berdasarkan harga jasa yang dipilih
            $biaya = $panjang * $lebar * $jasaTerpilih->harga;

            // Menyimpan biaya yang dihitung dan informasi jasa yang dipilih ke dalam session storage
            $request->session()->put('biaya', $biaya);
            $request->session()->put('jasa_terpilih', $jasaTerpilih);

            // Simpan aktivitas di session storage
            $request->session()->put('user_activity', 'Tombol Submit diklik');

            return redirect('/');
        } else {
            // Mengatasi kasus di mana jasa yang dipilih tidak ditemukan
            // Anda dapat menetapkan pesan error atau mengarahkan kembali dengan pesan error
            return redirect()->back()->with('error', 'Jasa yang dipilih tidak ditemukan');
        }
    }
    public function index()
    {
        $logActivity = LogActivity::orderBy('created_at', 'desc')->get();
        return view('dashboard.logactivity.index', ['activity_logs' => $logActivity]);
    }
}
