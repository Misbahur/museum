<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buktibayar extends Model
{
    use HasFactory;
    protected $fillable = ['bukti'];

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
