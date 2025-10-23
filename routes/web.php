<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('administrator.dashboard_admin');
});

Route::get('/administrator/dashboard_admin', function () {
    return view('administrator.dashboard_admin');
});

Route::get('/administrator/detailfolder_admin', function () {
    return view('administrator.detailfolder_admin');
});

Route::get('/administrator/dokumen_admin', function () {
    return view('administrator.dokumen_admin');
});

Route::get('/administrator/dokumen_hubker', function () {
    return view('administrator.dokumen_hubker');
});

Route::get('/administrator/dokumen_k3', function () {
    return view('administrator.dokumen_k3');
});

Route::get('/administrator/dokumen_penyidikan', function () {
    return view('administrator.dokumen_penyidikan');
});

Route::get('/administrator/dokumen_perempuan_anak', function () {
    return view('administrator.dokumen_perempuan_anak');
});

Route::get('/administrator/dokumen_wkwi', function () {
    return view('administrator.dokumen_wkwi');
});

Route::get('/administrator/folder_admin', function () {
    return view('administrator.folder_admin');
});

Route::get('/administrator/kategori_admin', function () {
    return view('administrator.kategori_admin');
});

Route::get('/administrator/laporan_admin', function () {
    return view('administrator.laporan_admin');
});

Route::get('/administrator/pengguna_admin', function () {
    return view('administrator.pengguna_admin');
});

Route::get('/administrator/suratkeluar_admin', function () {
    return view('administrator.suratkeluar_admin');
});

Route::get('/administrator/suratmasuk_admin', function () {
    return view('administrator.suratmasuk_admin');
});

Route::get('/components/filterbox', function () {
    return view('components.filterbox');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
