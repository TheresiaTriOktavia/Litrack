<?php

namespace App\Http\Controllers;

use App\Models\Ipal;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class IpalController extends Controller
{
    /**
     * Menampilkan daftar IPAL.
     */
    public function index(): View
    {
        $ipal = Ipal::latest()->paginate(5);

        return view('ipal.ipal', compact('ipal'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Menyimpan data IPAL baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $message = [
            'nama.required'   => 'Nama IPAL belum diisi!',
            'lokasi.required' => 'Lokasi IPAL belum diisi!',
            'status.required' => 'Status IPAL wajib dipilih!',
            'ket.required'    => 'Deskripsi IPAL jangan dikosongin ya!',
        ];

        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'ket'    => 'required|string|max:1000',
        ], $message);

        Ipal::create($validated);
        return redirect()->route('ipal.index')->with('success', 'Data IPAL berhasil disimpan.');
    }

    /**
     * Memperbarui data IPAL berdasarkan ID.
     */
    public function update(Request $request, $id_ipal): RedirectResponse
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'ket'    => 'required|string|max:1000',
        ]);

        $ipal = Ipal::findOrFail($id_ipal);
        $ipal->update($validated);

        return redirect()->route('ipal.index')->with('success', 'Data IPAL berhasil diperbarui.');
    }

    /**
     * Menghapus data IPAL berdasarkan ID.
     */
    public function destroy($id_ipal): RedirectResponse
    {
        $ipal = Ipal::findOrFail($id_ipal);
        $ipal->delete();

        return redirect()->route('ipal.index')->with('success', 'Data IPAL berhasil dihapus.');
    }
}
