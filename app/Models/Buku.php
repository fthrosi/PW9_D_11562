<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'id_penerbit',
        'judul',
        'penulis',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_penerbit');
    }

}
