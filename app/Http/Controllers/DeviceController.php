<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
class DeviceController extends Controller
{
    public function index(): View
    {
        
        // $activeDevices = Device::where('status', 1)->count();
        // $inactiveDevices = Device::where('status', 0)->count();
        $device = Device::latest()->paginate(5);
        return view('device.index', compact('device'))
                ->with('i',(request()->input('page', 1)-1)*5);
        

        
        
    }


}