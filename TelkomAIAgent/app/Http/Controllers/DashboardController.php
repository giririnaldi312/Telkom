<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\MaintenanceLog;

class DashboardController extends Controller
{
    public function index()
    {
        $sites = Site::orderBy('site_id')->get();

        $logs = MaintenanceLog::latest()->take(10)->get();

        return view('dashboard', compact('sites', 'logs'));
    }
}
