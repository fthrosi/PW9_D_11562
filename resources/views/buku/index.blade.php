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
    <h3 class="title">Buku Saya</h3>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card" style="background-color: rgba(255,255,255,0.5);">
                    <div class="card-body">
                        <a href="{{ route('buku.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BUKU</a>
                        <div class="table-responsive p-0">
                            <table class="table table-hover textnowrap">
                                <thead class="judulTabel">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Judul Buku</th>
                                        <th class="text-center">Penulis</th>
                                        <th class="text-center">Status Buku</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">
                                    @forelse ($buku as $item)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $item->judul }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $item->penulis }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $item->status}}</td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ingin mengubah ini ?');" action="{{ route('buku.edit', $item->id_buku) }}" method="GET"class="d-inline">
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent text-primary"><i class="fa-solid fa-pencil"></i></button>
                                            </form>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ingin menghapus ?');" action="{{ route('buku.destroy', $item->id_buku) }}" method="POST"class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent text-danger"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">
                                        Anda Belum Memiliki Data Buku
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $buku->links() }}
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