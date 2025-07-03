<?php

namespace App\Http\Controllers;

use App\Models\RegDev;
use App\Models\Device;
use App\Models\IPAL;
use App\Models\Location;
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
        $ipals = Ipal::all();
        $lokasis = Location::all();

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

    // ✅ Generate id_regDev berdasarkan ID terakhir (supaya tidak duplikat)
    $prefix = 'RD-' . now()->format('Ymd') . '-';

    $lastId = RegDev::where('id_regDev', 'like', "$prefix%")
        ->orderByDesc('id_regDev')
        ->first();

    if ($lastId) {
        $lastNumber = (int) substr($lastId->id_regDev, -3);
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    $id_regDev = $prefix . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    // Simpan ke database
    RegDev::create([
        'id_regDev' => $id_regDev,
        'nama_rd'   => $validated['nama_rd'],
        'status'    => $validated['status'],
        'ket'       => $validated['ket'],
        'id_dev'    => $validated['id_dev'],
        'id_ipal'   => $validated['id_ipal'],
        'id_lok'    => $validated['id_lok'],
    ]);

    return redirect()->route('regdev.index')->with('success', 'Register device berhasil disimpan.');
}


    /**
     * Update data register device.
     */
    public function update(Request $request, $id_rd): RedirectResponse
    {
        $request->validate([
            'nama_rd' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'ket' => 'required|string|max:1000',
            'id_dev' => 'required|exists:tbl_device,id_dev',
            'id_ipal' => 'required|exists:tbl_ipal,id_ipal',
            'id_lok' => 'required|exists:tbl_lokasi,id_lok',
        ]);

        $regdev = RegDev::findOrFail($id_rd);

        $regdev->update([
            'nama_rd' => $request->nama_rd,
            'status'  => $request->status,
            'ket'     => $request->ket,
            'id_dev'  => $request->id_dev,
            'id_ipal' => $request->id_ipal,
            'id_lok'  => $request->id_lok,
        ]);

        return redirect()->route('regdev.index')->with('success', 'Register device berhasil diupdate.');
    }

    /**
     * Hapus data register device.
     */
    public function destroy($id_rd): RedirectResponse
    {
        $regdev = RegDev::findOrFail($id_rd);
        $regdev->delete();

        return redirect()->route('regdev.index')->with('success', 'Data berhasil dihapus!');
    }
}
