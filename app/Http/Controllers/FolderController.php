<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\ArsipItem;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index($divisi)
    {
        // NORMALISASI
        $divisi = strtolower($divisi);

        // daftar divisi valid
        $allowed = [
            'k3',
            'hubker',
            'wkwi',
            'tu',
            'penyidikan',
            'perempuan_anak',
            'admin',
            'semua',
        ];

        abort_if(!in_array($divisi, $allowed), 404);

        // JIKA SEMUA → TANPA FILTER
        if ($divisi === 'semua') {
            $arsip   = ArsipItem::latest()->get();
            $folders = Folder::latest()->get();
        } else {
            $arsip   = ArsipItem::where('divisi', $divisi)->latest()->get();
            $folders = Folder::where('divisi', $divisi)->latest()->get();
        }

        return view("administrator.dokumen_$divisi", compact(
            'arsip',
            'folders',
            'divisi'
        ));
    }

    public function detail($id)
    {
        $folder = Folder::findOrFail($id);
        $arsip  = ArsipItem::where('folder_id', $id)->get();

        return view('administrator.detailfolder_admin', compact('folder', 'arsip'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string',
            'nama_kasus'      => 'nullable|string',
            'nomor_surat'     => 'nullable|string',
            'divisi'          => 'required|string',
        ]);

        Folder::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_kasus'      => $request->nama_kasus,
            'nomor_surat'     => $request->nomor_surat,
            'divisi'          => strtolower($request->divisi),
        ]);

        return back()->with('success', 'Folder berhasil dibuat');
    }

    public function admin(Request $request)
    {
        $query = Folder::query();

        $divisi = null;
        if ($request->filled('divisi')) {
            $divisi = strtolower($request->divisi);
            $query->where('divisi', $divisi);
        }

        $folders = $query->latest()->get();

        return view('administrator.folder_admin', compact('folders', 'divisi'));
    }
    public function detailFolder($id)
    {
        $folder = Folder::with('arsip')->findOrFail($id);

        return view('administrator.detail_folder', compact('folder'));
    }
    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);

        // Hanya hapus kalau folder kosong
        if ($folder->arsip->count() > 0) {
            return redirect()->back()->with('error', 'Folder masih berisi arsip, tidak bisa dihapus!');
        }

        $folder->delete();

        return redirect()->back()->with('success', 'Folder berhasil dihapus!');
    }
}
