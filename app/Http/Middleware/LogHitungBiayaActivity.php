<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogHitungBiayaActivity
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Cek apakah request saat ini memanggil hitungBiaya
        if ($request->route()->getName() === 'hitung.biaya') {
            // Dapatkan ID pengguna jika terautentikasi, jika tidak, gunakan alamat IP
            $userId = auth()->check() ? auth()->id() : null;
            $userActivity = auth()->check() ? auth()->user()->name : 'Guest';

            // Lakukan log aktivitas ke dalam database
            DB::table('activity_logs')->insert([
                'id' => $userId,
                'activity' => 'User activity: ' . $userActivity . ' - hitungBiaya',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $response;
    }
}
