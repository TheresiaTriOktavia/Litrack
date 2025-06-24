<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\View\View;

class DashboardController  
{
     public function dashboard(): View
    {
        return view('dashboard.index');
    } 
}
