@extends('layouts.main')

@section('title','Book')
    
@section('konten')
    <div class="container">
        <br>
        <h1>Halaman Books</h1>
        <hr>
        <h2>Tabel data buku</h2>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>judul</th>
                    <th>penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    <th>Aksi</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($book_data as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->penulis }}</td>
                        <td>{{ "Rp. ".number_format($data -> harga, 2, ',','.')}}</td>
                        <td>
                            @if ($data->tgl_terbit instanceof \DateTime)
                                {{ $data->tgl_terbit->format('d/m/y') }}
                            @else
                                {{ $data->tgl_terbit }}
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('Book.destroy', $data->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin mau hapus?')" type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="button">
            <a href="{{ route('Book.create') }}">
                <button type="button" class="btn btn-primary" >Add Book</button>
            </a>
        </div>

            
    
    </div>
@endsection