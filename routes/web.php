<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ArsipItemController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\DashboardController;
use App\Models\ArsipItem;
use App\Models\Folder;


// Route::get('/auth.login', function () {
//     return view('login');
// })->middleware(['auth'])->name('login');




Route::get('/', function () {
    // Jika sudah login → arahkan ke dashboard
    if (Auth::check()) {
        return redirect()->route('dashboard_admin');
    }

    // Jika belum login → arahkan ke halaman login
    return redirect()->route('login');
});

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// Rute dashboard hanya bisa diakses jika sudah login
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard_admin', function () {
//         return view('dashboard_admin');
//     })->name('dashboard_admin');
// });

Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
});



Route::post('/folder/store', [FolderController::class, 'store'])->name('folder.store');
// Route::get('/folder', [FolderController::class, 'index'])->name('folder.index');
// 🔹 Folder ADMIN (tanpa divisi)
Route::get('/folder-admin', [FolderController::class, 'admin'])
    ->name('folder_admin');

// 🔹 Folder per divisi
Route::get('/folder/{divisi}', [FolderController::class, 'index'])
    ->name('folder.divisi');

Route::get('/administrator/dokumen/{divisi}', [FolderController::class, 'index'])
    ->name('dokumen.divisi');

Route::delete('/folders/{folder}', [FolderController::class, 'destroy'])->name('folder.destroy');


Route::middleware(['auth'])->group(function () {

    Route::resource('arsip', ArsipItemController::class);

    // Route::get('/administrator/dashboard_admin', function () {
    //     $arsip = ArsipItem::latest()->get();
    //     return view('administrator.dashboard_admin', compact('arsip'));
    // })->name('dashboard_admin');

    Route::get(
        '/administrator/dashboard_admin',
        [DashboardController::class, 'index']
    )->name('dashboard_admin');


    Route::get('/administrator/detailfolder_admin/{id}', [FolderController::class, 'detail'])
        ->name('folder.detail');

    Route::get(
        '/administrator/dokumen/{divisi}',
        [FolderController::class, 'index']
    )->name('dokumen.divisi');

    Route::get(
        '/administrator/folder_admin',
        [FolderController::class, 'admin']
    )->name('folder.admin');



    // Route::get('/administrator/folder_admin', function () {
    //     $folders = Folder::latest()->get();
    //     return view('administrator.folder_admin', compact('folders'));
    // });

    Route::get('/administrator/kategori_admin', fn() => view('administrator.kategori_admin'));
    Route::get('/administrator/laporan_admin', fn() => view('administrator.laporan_admin'));
    Route::get('/administrator/pengguna_admin', fn() => view('administrator.pengguna_admin'));
    Route::get('/administrator/suratkeluar_admin', fn() => view('administrator.suratkeluar_admin'));
    Route::get('/administrator/suratmasuk_admin', fn() => view('administrator.suratmasuk_admin'));
    Route::get('/components/filterbox', fn() => view('components.filterbox'));
});

require __DIR__ . '/auth.php';



    
//     Route::get('/administrator/dokumen_admin', function () {
//         $arsip = ArsipItem::latest()->get();
//         $folders = Folder::all(); // WAJIB

//         return view('administrator.dokumen_admin', compact('arsip', 'folders'));
//     });


//     Route::get('/administrator/dokumen_tu', function () {
//         $arsip = ArsipItem::latest()->get();
//         $folders = Folder::all();

//         return view('administrator.dokumen_tu', compact('arsip', 'folders'));
//     });


//     Route::get('/administrator/dokumen_hubker', function () {

//         $arsip = ArsipItem::where('divisi', 'hubker')->latest()->get();
//         $folders = Folder::all();

//         return view('administrator.dokumen_hubker', compact('arsip', 'folders'));
//     });

//     Route::get('/administrator/dokumen_k3', function () {

//         $arsip = ArsipItem::where('divisi', 'k3')->latest()->get();
//         $folders = Folder::all();

//         return view('administrator.dokumen_k3', compact('arsip', 'folders'));
//     });

//     Route::get('/administrator/dokumen_penyidikan', function () {
//     $arsip = ArsipItem::latest()->get();
//     $folders = Folder::all();

//     return view('administrator.dokumen_penyidikan', compact('arsip', 'folders'));
// });

//     Route::get('/administrator/dokumen_perempuan_anak', function () {
//         $arsip = ArsipItem::latest()->get();
//         $folders = Folder::all();

//         return view('administrator.dokumen_perempuan_anak', compact('arsip', 'folders'));
//     });
    
//     Route::get('/administrator/dokumen_wkwi', function () {
//         $arsip = ArsipItem::latest()->get();
//         $folders = Folder::all();

//         return view('administrator.dokumen_wkwi', compact('arsip', 'folders'));
//     });






// Route::get('/', function () {
//     return view('administrator.dashboard_admin');
// });

// Route::get('/administrator/dashboard_admin', function () {
//     return view('administrator.dashboard_admin');
// });

// Route::get('/administrator/detailfolder_admin', function () {
//     return view('administrator.detailfolder_admin');
// });

// Route::get('/administrator/dokumen_admin', function () {
//     return view('administrator.dokumen_admin');
// });

// Route::get('/administrator/dokumen_hubker', function () {
//     return view('administrator.dokumen_hubker');
// });

// Route::get('/administrator/dokumen_k3', function () {
//     return view('administrator.dokumen_k3');
// });

// Route::get('/administrator/dokumen_penyidikan', function () {
//     return view('administrator.dokumen_penyidikan');
// });

// Route::get('/administrator/dokumen_perempuan_anak', function () {
//     return view('administrator.dokumen_perempuan_anak');
// });

// Route::get('/administrator/dokumen_wkwi', function () {
//     return view('administrator.dokumen_wkwi');
// });

// Route::get('/administrator/folder_admin', function () {
//     return view('administrator.folder_admin');
// });

// Route::get('/administrator/kategori_admin', function () {
//     return view('administrator.kategori_admin');
// });

// Route::get('/administrator/laporan_admin', function () {
//     return view('administrator.laporan_admin');
// });

// Route::get('/administrator/pengguna_admin', function () {
//     return view('administrator.pengguna_admin');
// });

// Route::get('/administrator/suratkeluar_admin', function () {
//     return view('administrator.suratkeluar_admin');
// });

// Route::get('/components/filterbox', function () {
//     return view('administrator.suratmasuk_admin');
// });

// Route::get('/components/filterbox', function () {
//     return view('components.filterbox');
// });

// Route::get('/auth/login', function () {
//     return view('auth.login');
// });




// SAMPAI SINI
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
