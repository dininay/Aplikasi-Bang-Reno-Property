<?php

namespace App\Http\Controllers;

use App\User;
use App\Dashboard;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard.index');
    }
}
