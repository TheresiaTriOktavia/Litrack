<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DeviceController extends Controller
{
    public function index(): View
    {
        $device = Device::latest()->paginate(5);
        return view('device.index', compact('device'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_dev' => 'required|string|max:255',
            'status'   => 'required|in:0,1',
            'ket'      => 'required|string|max:1000',
        ], [
            'nama_dev.required' => 'Device belum diisi boyy',
            'status.required'   => 'Status belum diisi Cess',
            'ket.required'      => 'Isi dulu keterangan ini brooku',
        ]);

        Device::create($validated);
        return redirect()->route('device.index')->with('success', 'Data device berhasil disimpan.');
    }

    public function update(Request $request, $id_dev): RedirectResponse
    {
        $validated = $request->validate([
            'nama_dev' => 'required|string|max:255',
            'status'   => 'required|in:0,1',
            'ket'      => 'required|string|max:1000',
        ]);

        $device = Device::findOrFail($id_dev);
        $device->update($validated);

        return redirect()->route('device.index')->with('success', 'Data device berhasil diperbarui.');
    }

    public function destroy($id_dev): RedirectResponse
    {
        $device = Device::findOrFail($id_dev);
        $device->delete();

        return redirect()->route('device.index')->with('success', 'Data device berhasil dihapus.');
    }
}
