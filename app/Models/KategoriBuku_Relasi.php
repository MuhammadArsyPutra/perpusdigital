<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku_Relasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'KategoriBukuID';

    protected $fillable = [
        'BukuID',
        'KategoriID',
    ];

    public function Buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }

    public function KategoriBuku()
    {
        return $this->belongsTo(KategoriBuku::class, 'KategoriID');
    }
}
