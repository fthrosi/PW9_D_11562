<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\PinjamBuku;
use App\Models\Buku;

use Illuminate\Http\Request;

class KembalikanController extends Controller
{
    public function index()
    {
        $kembali = PinjamBuku::where('id_peminjam',Auth::user()->id_user)->whereNull('tanggal_kembali')->latest()->paginate(5);
        //render view with posts
        return view('pengembalian.index', compact('kembali'));
    }
    public function kembali($id){
        PinjamBuku::where("id_pinjam_buku",$id)->update([
            'tanggal_kembali' => date('Y-m-d')
        ]);
        Buku::where('id_buku',$id)->update([
            'status' => 'Tersedia'
        ]);
        return redirect()->back();
    }
}
