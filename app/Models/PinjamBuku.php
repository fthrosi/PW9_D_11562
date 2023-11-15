<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamBuku extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_peminjam',
        'id_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];
    protected $primaryKey = 'id_pinjam_buku';
    public function User()
    {
        return $this->belongsTo(User::class, 'id_peminjam');
    }
    public function Buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
