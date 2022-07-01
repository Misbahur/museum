<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doc_persyaratan extends Model
{
    protected $table="doc_persyaratans";
    protected $fillable = ['doc', 'kategori_id'];

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
