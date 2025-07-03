<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LocationController extends Controller
{
    /**
     * Menampilkan daftar lokasi.
     */
    public function index(): View
    {
        $location = Location::latest()->paginate(5);

        return view('location.lokasi', compact('location'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Menyimpan data lokasi baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $message = [
            'nama.required' => 'Nama lokasi belum diisi broh!',
            'status.required' => 'Status lokasi wajib dipilih!',
            'ket.required' => 'Deskripsinya jangan dikosongin dong!',
        ];

        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'ket'    => 'required|string|max:1000',
        ], $message);

        Location::create($validated);
        return redirect()->route('location.index')->with('success', 'Data lokasi berhasil disimpan.');
    }

    /**
     * Memperbarui data lokasi berdasarkan ID.
     */
    public function update(Request $request, $id_lok): RedirectResponse
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'ket'    => 'required|string|max:1000',
        ]);

        $location = Location::findOrFail($id_lok);
        $location->update($validated);

        return redirect()->route('location.index')->with('success', 'Data lokasi berhasil diperbarui.');
    }

    /**
     * Menghapus data lokasi berdasarkan ID.
     */
    public function destroy($id_lok): RedirectResponse
    {
        $location = Location::findOrFail($id_lok);
        $location->delete();

        return redirect()->route('location.index')->with('success', 'Data lokasi berhasil dihapus.');
    }
}
