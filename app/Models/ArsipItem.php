<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArsipItem extends Model
{
    use SoftDeletes;

    protected $table = 'arsip_items';

    protected $fillable = [
        'folder_id',
        'nomor_berkas',
        'nomor_item_arsip',
        'kode_klasifikasi',
        'nama_klasifikasi',
        'nomor_surat',
        'tanggal_surat',
        'jenis_surat',
        'dari',
        'ke',
        'perihal',
        'jumlah_lembar',
        'tingkat_perkembangan',
        'klasifikasi_keamanan',
        'hak_akses',
        'akses_publik',
        'dasar_pertimbangan',
        'link_tautan',
        'status_folder',
        'status_kasus',
        'divisi',
    ];
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }
}


