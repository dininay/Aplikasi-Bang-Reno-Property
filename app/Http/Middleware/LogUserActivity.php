<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class LogUserActivity
{
    public function handle($request, Closure $next)
    {
        $activityLog = Session::get('user_activity_log', []);

        // Tambahkan aktivitas baru ke dalam log
        $activityLog[] = [
            'activity' => $request->getPathInfo(),
            'timestamp' => now(),
        ];

        // Simpan log aktivitas kembali ke dalam session
        Session::put('user_activity_log', $activityLog);

        return $next($request);
    }
}
