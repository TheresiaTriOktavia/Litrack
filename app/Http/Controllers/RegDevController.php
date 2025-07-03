<?php

namespace App\Http\Controllers;

use App\Models\RegDev;
use App\Models\Device;
use App\Models\IPAL;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegDevController extends Controller
{
    /**
     * Tampilkan daftar registered device.
     */
    public function index(): View
    {
        $regdev = RegDev::with(['device', 'ipal', 'lokasi'])->latest()->paginate(5);
        $devices = Device::all();
        $ipals = IPAL::all();
        $lokasis = Lokasi::all();

        return view('regdev.registered', compact('regdev', 'devices', 'ipals', 'lokasis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Simpan data register device.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $messages = [
            'nama_rd.required' => 'Nama register device wajib diisi!',
            'status.required' => 'Status wajib dipilih!',
            'ket.required' => 'Keterangan wajib diisi!',
            'id_dev.required' => 'Device wajib dipilih!',
            'id_ipal.required' => 'IPAL wajib dipilih!',
            'id_lok.required' => 'Lokasi wajib dipilih!',
        ];

        $validated = $request->validate([
            'nama_rd' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'ket' => 'required|string|max:1000',
            'id_dev' => 'required|exists:tbl_device,id_dev',
            'id_ipal' => 'required|exists:tbl_ipal,id_ipal',
            'id_lok' => 'required|exists:tbl_lokasi,id_lok',
        ], $messages);

        // Simpan ke database
        RegDev::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('regdev.index')->with('success', 'Register device berhasil disimpan.');
    }

    public function destroy($id_rd)
{
    $regdev = RegDev::findOrFail($id_rd);
    $regdev->delete();

    return redirect()->route('regdev.index')->with('success', 'Data berhasil dihapus!');
}

}
