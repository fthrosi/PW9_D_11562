<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\PinjamBuku;
use App\Models\Buku;
use App\Models\User;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = PinjamBuku::where('id_peminjam',Auth::user()->id_user)->latest()->paginate(5);
        //render view with posts
        return view('history', compact('history'));
    }
}
