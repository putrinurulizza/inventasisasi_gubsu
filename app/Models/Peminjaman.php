<?php

namespace App\Models;

use App\Models\DetailPeminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    protected $guarded = ['id'];

    public function detailsPeminjamans()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_peminjaman');
    }
}
