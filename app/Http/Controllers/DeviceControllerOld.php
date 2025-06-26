<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::latest()->get();
        return view('devices.index', compact('devices'));
    }

    public function create()
    {
        return view('devices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dev' => 'required|string|max:255',
            'ket' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Device::create($request->all());

        return redirect()->route('devices.index')
            ->with('success', 'Device created successfully.');
    }

    // Tambahkan method berikut ke controller yang sudah ada
public function show($id)
{
    $device = Device::findOrFail($id);
    return view('devices.show', compact('device'));
}

public function edit($id)
{
    $device = Device::findOrFail($id);
    return view('devices.edit', compact('device'));
}

    public function update(Request $request, Device $device)
    {
        $request->validate([
            'nama_dev' => 'required|string|max:255',
            'ket' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $device->update($request->all());

        return redirect()->route('devices.index')
            ->with('success', 'Device updated successfully');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('devices.index')
            ->with('success', 'Device deleted successfully');
    }
}