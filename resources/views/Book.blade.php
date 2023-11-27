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
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection