@extends('layouts.main')

@section('title','Service')
    
@section('konten')
    <div class="style" style="height: 80vh">
        <h2 class="container">Selamat datang di {{ $halaman }}</h2>
        <p class="container">Hallo {{ $nama }}</p>
    </div>
@endsection