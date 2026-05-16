<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Perpustakaan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h1>Manajemen Perpustakaan</h1>
        @if (Auth::check())
        <p>Anda Login Sebagai <strong>{{ Auth::user()->name }}</strong></p>
        <form action="{{ route('logoutProses') }}" method="post">
            @csrf
            <button type="submit" class="tombol">Logout</button>
        </form>
        @endif
        <div class="nav">
            <ul>
                <li><a href="/kategori">Kategori</a></li>
                <li><a href="/penerbit">Penerbit</a></li>
                <li><a href="/buku">Buku</a></li>
            </ul>
        </div>