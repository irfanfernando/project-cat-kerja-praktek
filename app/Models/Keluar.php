<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;

    protected $table = 'keluar';

    public function stock(){
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }
}
