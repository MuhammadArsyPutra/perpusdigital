<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanBuku extends Model
{
    use HasFactory;

    protected $primaryKey = 'UlasanID';

    protected $fillable = [
        'UserID',
        'BukuID',
        'Ulasan',
        'Rating',
    ];

    protected $casts = [
        'Ulasan' => 'text',
        'Rating' => 'integer',
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
