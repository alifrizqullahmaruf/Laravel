@extends('layouts.main')

@section('title', 'Form Membuat Buku')

@section('konten')
    <div class="container mt-5">
        <h2>Form Tambah Buku</h2>
        <form action="{{ route('Book.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>

            <div class="form-group">
                <label for="tgl_terbit">Tanggal Terbit:</label>
                <input type="date" class="form-control" id="tgl_terbit" name="tgl_terbit" required>
            </div>

            <button style="margin-top: 30px" type="submit" class="btn btn-primary">Tambah Buku</button>
            @if(count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
        <a href="/Book">
            <button style="margin-top: 50px" type="button" class="btn" >
                Kembali
            </button>
        </a>

    </div>
@endsection