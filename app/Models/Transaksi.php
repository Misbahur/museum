<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal_berkunjung', 'barcode', 'jumlah_pengunjung', 'status', 'kategori_id', 'sesi_id', 'doc_persyaratan_id', 'pengunjung_id'];

    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class);
    }

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function doc_persyaratan()
    {
        return $this->belongsTo(doc_persyaratan::class);
    }
}
