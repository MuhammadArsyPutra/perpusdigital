<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiPribadi extends Model
{
    use HasFactory;

    protected $primaryKey = 'KoleksiID';

    protected $fillable = [
        'UserID',
        'BukuID',
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
