@extends('layouts.main')

@section('title', 'Form Mengedit Buku')

{{-- Form unutk menegedit data --}}
@section('konten')
    <div class="container mt-5">
        <h2>Form Edit Buku</h2>
        <form action="{{ route('Book.update', $book_data->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $book_data->judul }}">
            </div>

            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $book_data->penulis }}">
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $book_data->harga }}">
            </div>

            <div class="form-group">
                <label for="tgl_terbit">Tanggal Terbit:</label>
                <input type="date" class="form-control" id="tgl_terbit" name="tgl_terbit" value="{{ $book_data->tgl_terbit }}">
            </div>

            {{-- Mmebuat Button unutk menyimpan perubahan --}}
            <button style="margin-top: 30px" type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
        <a href="/Book">
            <button style="margin-top: 50px" type="button" class="btn">
                Kembali
            </button>
        </a>
    </div>
@endsection
