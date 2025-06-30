<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DeviceController extends Controller
{
    /**
     * Menampilkan daftar device.
     */
    public function index(): View
    {
        $device = Device::latest()->paginate(5);

        return view('device.index', compact('device'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Menyimpan data device baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi inputan form
        $message = [
            'nama_dev.required' => 'Device belum diisi boyy',
            'status.required' => 'Status belum diisi Cess',
            'ket.required' => 'Isi dulu keterangan ini brooku',
        ];
        $validated = $request->validate([
            'nama_dev' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'ket' => 'required|string|max:1000',
        ], $message);

        // Simpan ke database hanya data yang tervalidasi
        Device::create($validated);

        // Redirect kembali ke halaman index dengan flash message sukses
        return redirect()->route('device.index')->with('success', 'Data device berhasil disimpan.');
    }
}

// 1. sweet alert 
// 2. ketika error field belum diisi dan klik submit maka tetap di posisi pop-up tidak keluar dari modal
// 3. action diaktifin : RUD (READ, UPDATE, DELETE) pake icon
// - read: ketika di read maka muncul pop up card info yang berisi Nama Device, keterangan, status 
// - update : sama kek create (bisa di edit dll) kalo di edit dikasih keterangannya juga di update (data berhasil di edit, dll)
// - delete : sebelum di delete akan ada validasi apakah beneran mau dihapus apa engga
// 4. tambahkan di sidebar device yaitu Registered Device (halamannya sama kaya device tapi isi tabelnya sesuai database
// di idRegDev dibikin otomatis kalo belum ada data mulai dari 1 d(bikinnya kayak code product)
// 5. insert manual tabel lokasi isinya: nama lokasi : area kantor cabang, area TPK, area lini II 
// insert manual tabel ipal isinya: nama ipal : Rumah IPAL A1, sumppit A1, sumppit A1, sumppit A1 dan lokasinya manggil lokasi 1

// WAJIB SELESAI MINGGU INI KAMI BERJANJI AKAN PRESENTASI DI HARI SENIN TANGGAL 7 JULI 2025, KALO TIDAK KAMI AKAN PUSH UP 5X & HUKUMAN SELANJUTNYA DITENTUKAN PADA HARI H
