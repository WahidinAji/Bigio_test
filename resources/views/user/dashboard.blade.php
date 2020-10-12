@extends('layouts.main')
@section('header')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li
                        class="nav-item {{ Request::url() == url('surveyor-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" aria-current="page"
                            href="{{ URL::route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('logout') }}"></i>
                            <span>Logout</span></a>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">Status : {{ Auth::user()->name }}
                        </p>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
@section('text-header','Data Komoditas')
@section('card-body')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar Barang</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($komoditas as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->jenis }}</td>
            @if ($item->status == 1)
            <td>Rp. {{ $item->harga }} </td>
            @else
            <td>Harga belum ditentukan!!</td>
            @endif
            <td style="width: 30%">
                <img src="{{ asset('/img/komoditas/'.$item->img) }}" alt="" width="100%">
            </td>
        </tr>
        @empty
        <tr>
        <td colspan="5" class="text-center">
            <p>Data kosong!!</p>
        </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

