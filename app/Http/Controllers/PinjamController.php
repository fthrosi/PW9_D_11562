<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\PinjamBuku;
use App\Models\Buku;
use App\Models\User;

use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $peminjaman = Buku::where('id_penerbit','!=',Auth::user()->id_user)->where('status','Tersedia')->latest()->paginate(5);
        //render view with posts
        return view('peminjaman.index', compact('peminjaman'));
    }
    public function create($id){
        $id_peminjam = Auth::user()->id_user;
        $tanggal_pinjam = date('Y-m-d');
        PinjamBuku::create([
            'id_peminjam' => $id_peminjam,
            'id_buku' => $id,
            'tanggal_pinjam' => $tanggal_pinjam,
        ]);
        Buku::where('id_buku',$id)->update([
            'status' => 'Dipinjam'
        ]);
        return redirect()->back();
     }
}
