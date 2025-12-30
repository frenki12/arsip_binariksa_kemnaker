<?php

namespace App\Http\Controllers;

use App\Models\ArsipItem;
use App\Models\Folder;
use Illuminate\Http\Request;

class ArsipItemController extends Controller
{
    /**
     * Menampilkan semua data arsip.
     */
    // public function index()
    // {
    //     $arsip = ArsipItem::latest()->get();
    //     $folders = Folder::all();
    //     return view('administrator.dokumen_admin', compact('arsip', 'folders'));
    // }

    public function index()
    {
        // DATA TABEL
        $arsip = ArsipItem::latest()->get();
        $folders = Folder::all();

        // STATISTIK CARD
        $totalSurat  = ArsipItem::count();
        $totalFolder = Folder::count();
        $selesai     = ArsipItem::where('status_kasus', 'Selesai')->count();
        $pending     = ArsipItem::where('status_kasus', 'Pending')->count();

        return view('administrator.dokumen_admin', compact(
            'arsip',
            'folders',
            'totalSurat',
            'totalFolder',
            'selesai',
            'pending'
        ));
    }

    public function dokumenDivisi($divisi)
    {
        $arsip = ArsipItem::where('divisi', $divisi)->latest()->get();
        $folders = Folder::all();

        $totalSurat  = ArsipItem::where('divisi', $divisi)->count();
        $totalFolder = Folder::count();
        $selesai     = ArsipItem::where('divisi', $divisi)
            ->where('status_kasus', 'Selesai')
            ->count();
        $pending     = ArsipItem::where('divisi', $divisi)
            ->where('status_kasus', 'Pending')
            ->count();

        if ($divisi === 'semua') {
            return redirect()->route('dokumen_admin');
        }


        return view('administrator.dokumen_admin', compact(
            'arsip',
            'folders',
            'totalSurat',
            'totalFolder',
            'selesai',
            'pending'
        ));
    }


    /**
     * Form tambah data.
     */
    public function create()
    {
        return view('arsip.create');
    }

    /**
     * Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_berkas' => 'nullable|string',
            'nomor_item_arsip' => 'nullable|string',
            'kode_klasifikasi' => 'nullable|string',
            'nama_klasifikasi' => 'nullable|string',
            'nomor_surat' => 'nullable|string',
            'tanggal_surat' => 'nullable|date',
            'jenis_surat' => 'nullable|string',
            'dari' => 'nullable|string',
            'ke' => 'nullable|string',
            'perihal' => 'nullable|string',
            'jumlah_lembar' => 'nullable|integer',
            'tingkat_perkembangan' => 'nullable|string',
            'klasifikasi_keamanan' => 'nullable|string',
            'hak_akses' => 'nullable|string',
            'akses_publik' => 'nullable|string',
            'dasar_pertimbangan' => 'nullable|string',
            'link_tautan' => 'nullable|string',
            'status_folder' => 'nullable|string',
            'status_kasus' => 'nullable|string',

            // WAJIB ADA
            'divisi' => 'required|string',
        ]);

        // NORMALISASI DIVISI
        $validated['divisi'] = strtolower($validated['divisi']);

        // SIMPAN
        ArsipItem::create($validated);

        // REDIRECT KE ROUTE YANG BENAR
        return redirect()
            ->route('dokumen.divisi', $validated['divisi'])
            ->with('success', 'Arsip berhasil ditambahkan');
    }

    /**
     * Form edit data.
     */
    public function edit($id)
    {
        $arsip = ArsipItem::findOrFail($id);
        return response()->json($arsip);
        // $arsip = ArsipItem::findOrFail($id);
        // return view('arsip.edit', compact('arsip'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, $id)
    {
        $arsip = ArsipItem::findOrFail($id);

        $validated = $request->validate([
            'nomor_berkas' => 'nullable|string',
            'nomor_item_arsip' => 'nullable|string',
            'kode_klasifikasi' => 'nullable|string',
            'nama_klasifikasi' => 'nullable|string',
            'nomor_surat' => 'nullable|string',
            'tanggal_surat' => 'nullable|date',
            'jenis_surat' => 'nullable|string',
            'dari' => 'nullable|string',
            'ke' => 'nullable|string',
            'perihal' => 'nullable|string',
            'jumlah_lembar' => 'nullable|integer',
            'tingkat_perkembangan' => 'nullable|string',
            'klasifikasi_keamanan' => 'nullable|string',
            'hak_akses' => 'nullable|string',
            'akses_publik' => 'nullable|string',
            'dasar_pertimbangan' => 'nullable|string',
            'link_tautan' => 'nullable|string',
            'status_folder' => 'nullable|string',
            'folder_id' => 'required|exists:folders,id',
            'status_kasus' => 'nullable|string',
            'divisi' => 'nullable|string',
        ]);

        // Normalisasi divisi
        $validated['divisi'] = strtolower($validated['divisi']);

        // Perbarui data yang sudah ada
        $arsip->update($validated);

        return back()->with('success', 'Data arsip berhasil diperbarui!');

        // $validated['divisi'] = strtolower($validated['divisi']);

        // ArsipItem::create($validated);

        // return back()->with('success', 'Arsip berhasil ditambahkan');

        // $arsip->update($validated);

        // return redirect()->route('arsip.index')->with('success', 'Data arsip berhasil diperbarui!');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
{
    $arsip = ArsipItem::findOrFail($id);
    $arsip->forceDelete();
    return redirect()->back()->with('success', 'Data arsip berhasil dihapus!');
}

}
