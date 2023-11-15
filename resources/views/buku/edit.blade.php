@extends('home')
@section('content')
<style>
    body {
        background-image: url("https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelflibrary_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16");
        background-size: cover;
    }

    .title {
        border-radius: 10px;
        background-color: rgba(173, 255, 47, 0.8);
        width: fit-content;
        font-weight: bold;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card" style="background-color: rgba(255,255,255,0.5);">
                    <div class="card-body">
                        <div class="container mt-2 d-flex justify-content-center title">
                            <h3 class="title">Edit Buku</h3>
                        </div>
                        <form action="{{ route('buku.update',$buku->id_buku)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Judul Buku</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul',$buku->judul) }}">
                                    @error('judul')
                                    <div class="invalid-feedback">x
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Penulis</label>
                                    <input type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" value="{{ old('penulis',$buku->penulis) }}">
                                    @error('penulis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        </form>
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