@extends('home')
@section('content')
<style>
    body{
        background-image: url("https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelflibrary_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16");
        background-size: cover;
    }
    .title{
        border-radius: 10px;
        background-color: rgba(173, 255, 47, 0.8);
        width: fit-content;
        font-weight: bold;
    }
    .judulTabel{
        background-color: grey;
    }
</style>
<div class="content">
<div class="container mt-4 d-flex justify-content-center title">
    <h3 class="title">History</h3>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card" style="background-color: rgba(255,255,255,0.5);">
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table table-hover textnowrap">
                                <thead class="judulTabel">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Judul Buku</th>
                                        <th class="text-center">Pengarang</th>
                                        <th class="text-center">Penerbit</th>
                                        <th class="text-center">Tanggal Pinjam</th>
                                        <th class="text-center">Tanggal Kembali</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">
                                    @forelse ($history as $item)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $item->buku->judul }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $item->buku->penulis }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $item->user->username }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $item->tanggal_pinjam }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $item->tanggal_kembali }}</td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if($item->tanggal_kembali == Null)
                                            Masih dipinjam
                                            @else
                                            Sudah dikembalikan
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">
                                        Belum Ada buku yang dipinjam
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $history->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>


@endsection