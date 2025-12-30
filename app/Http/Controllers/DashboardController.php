<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ArsipItem;
use App\Models\Folder;

class DashboardController extends Controller
{
    public function index()
    {
        $arsip = ArsipItem::latest()->get();
        $folders = Folder::all();
        
        // TOTAL
        $totalSurat  = ArsipItem::count();
        $totalFolder = Folder::count();
        $selesai     = ArsipItem::where('status_kasus', 'Selesai')->count();
        $pending     = ArsipItem::where('status_kasus', 'Pending')->count();

        // BULAN INI
        $bulanIni = ArsipItem::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // BULAN LALU
        $bulanLalu = ArsipItem::whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();

        // HITUNG PERSENTASE
        if ($bulanLalu > 0) {
            $persenNaik = (($bulanIni - $bulanLalu) / $bulanLalu) * 100;
        } else {
            $persenNaik = 0;
        }

        $persenNaik = round($persenNaik, 1); // 1 angka desimal

        return view('administrator.dashboard_admin', compact(
            'arsip',
            'folders',
            'totalSurat',
            'totalFolder',
            'selesai',
            'pending',
            'persenNaik'
        ));
    }
}
