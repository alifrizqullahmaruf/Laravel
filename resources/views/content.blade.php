@extends('layouts.main')

@section('title','Content')

@section('konten')
    <!-- Konten Halaman -->
<div class="container mt-4" style="height:83vh">
    <h3>Hallo Bos {{ $nama }} 🔥</h3>
    <h1>Selamat datang di halaman utama!</h1> <br>

    {{-- ini adalah contoh penggunaan if else dalam laravel dengan menggunakan blade template --}}
    {{-- @if ($role == 'admin')
        <a href="#"> Pergi ke halaman Admin</a>
    @elseif ($role == 'user')
        <a href="#"> Pergi ke halaman user</a>
    @endif --}}

    {{-- kita akan menggunakan switch. Sama dengan if namun jika mengiginkan decision yang lebih tersturktur dan banyak lebih baik menggunakan switch--}}
    {{-- @switch($role)
        @case('admin')
          <a href="#"> Pergi ke halaman Admin</a>
            @break
        @case('user')
          <a href="#"> Pergi ke halaman user</a>
            @break
        @default
            <a href="#">Pergi ke halaman utama  </a>
    @endswitch --}}


    {{-- Menggunakn loop, dan menggunakan loop variabel--}}
    {{-- <table class="table">
      <tr>
        <th>No</th>
        <th>Nama buah</th>
      </tr>
      @foreach ($items as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item}}</td>
      </tr>
      @endforeach
    </table> --}}

  </div>
@endsection