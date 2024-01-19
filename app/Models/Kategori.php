<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $primaryKey = 'KategoriID';

    protected $fillable = ['NamaKategori'];

    public function KategoriBuku_Relasi()
    {
        return $this->hasMany(KategoriBuku_Relasi::class);
    }
}
