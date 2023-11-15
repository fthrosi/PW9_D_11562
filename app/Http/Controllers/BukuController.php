<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::where('id_penerbit',Auth::user()->id_user)->latest()->paginate(5);
        //render view with posts
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        $buku = Buku::all(); // Mengambil semua data tiket dari model Ticket

        return view('buku.create', compact('buku'));
    }
    public function store(Request $request)
    {
        //Validasi Formulir
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required'
        ], [
            'judul.required' => 'Judul tidak boleh kosong',
            'penulis.required' => 'Penulis tidak boleh kosong',
        ]);
        $status = 'Tersedia';
        $id_penerbit = Auth::user()->id_user;
        //Fungsi Simpan Data ke dalam Database
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'id_penerbit' => $id_penerbit,
            'status' => $status
        ]);
        try {
            return redirect()->route('buku.index');
        } catch (Exception $e) {
            return redirect()->route('buku.index');
        }
    }
    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id_buku)
    {
        $buku = Buku::find($id_buku);
        return view('buku.edit', compact('buku'));
    }
    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id_buku)
    {
        $buku = Buku::find($id_buku);
        //validate form
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required'
        ]);
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
        ]);
        return redirect()->route('buku.index')->with(['success' => 'Data 
        Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
