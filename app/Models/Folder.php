<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'nama_kasus',
        'nomor_surat',
        'divisi'
    ];

    public function arsip()
    {
        return $this->hasMany(ArsipItem::class, 'folder_id');
    }
}
