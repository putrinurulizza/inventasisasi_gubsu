<?php

namespace App\Models;

use App\Models\DetailPeminjaman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'id_kategori',
        'kode_barang',
        'deskripsi_barang',
        'serial_number',
        'lokasi_user',
        'tahun_pengadaan',
        'keterangan',
        'kondisi_barang'
    ];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function DetailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_barang');
    }
}
