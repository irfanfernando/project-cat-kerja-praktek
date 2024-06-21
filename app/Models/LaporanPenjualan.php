<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    use HasFactory;

    protected $table = 'laporanpenjualan';

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }
}
