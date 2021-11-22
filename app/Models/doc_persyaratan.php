<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doc_persyaratan extends Model
{
    use HasFactory;
    protected $fillable = ['doc', 'kategori_id'];
}
