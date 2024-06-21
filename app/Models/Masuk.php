<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;

    protected $table = 'masuk';

    public function stock(){
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }
}
