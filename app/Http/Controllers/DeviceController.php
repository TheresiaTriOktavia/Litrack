<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Session;
use Illuminate\Support\Facedes\Validator;

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
    
    public function store (Request $request): RedirectResponse{

        $request->validate([
            'nama_dev' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'ket' => 'nullable|string',
        ]);

        

        // dd($device);
        
        // Device::create([
        //     'nama_dev' => $request -> nama_dev,
        //     'status' => $request -> status,
        //     'ket' => $request -> ket,

        // ]);

        // return redirect()->route('device.index')->with('success', 'Device Successfully Added!');
    }

    
}