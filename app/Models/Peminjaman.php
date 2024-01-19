<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $primaryKey = 'PeminjamanID';

    protected $fillable = [
        'UserID',
        'BukuID',
        'TanggalPeminjaman',
        'TanggalPengembalian',
        'StatusPeminjaman'
    ];

    protected $casts = [
        'TanggalPeminjaman' => 'date',
        'TanggalPengembalian' => 'date',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function Buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }
}
