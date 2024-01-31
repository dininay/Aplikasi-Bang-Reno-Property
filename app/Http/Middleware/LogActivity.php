<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogActivity
{
    public function handle($request, Closure $next)
{
    $response = $next($request);

    // Dapatkan ID pengguna jika terautentikasi, jika tidak, gunakan alamat IP
    $userId = auth()->check() ? auth()->id() : null;
    $userActivity = auth()->check() ? Auth::user()->name : 'Guest';
    
    // Lakukan log aktivitas ke dalam database
    DB::table('activity_logs')->insert([
        'activity' => 'User activity: ' . $userActivity . ' - ' . $request->getPathInfo(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return $response;
}

}
