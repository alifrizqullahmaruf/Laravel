@extends('layouts.main')

@section('title','Book')
    
@section('konten')
    <div class="container">
        <br>
        <h1 class="text-center">Halaman Books</h1>
        <hr>
        <h2 class="mt-5">Tabel data buku</h2>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>judul</th>
                    <th>penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    <th>Hapus</th>
                    <th>Modifikasi</th>
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
                        <td>
                            {{-- Membuat button unutk pergi ke page edit --}}
                            <form action="{{ route('Book.edit', $data->id) }}" method="GET">
                                @csrf
                                <button class="btn btn-warning" >Edit data</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="button mt-5">
            <a href="{{ route('Book.create') }}">
                <button type="button" class="btn btn-primary" >Add Book</button>
            </a>
        </div>

            
    
    </div>
@endsection