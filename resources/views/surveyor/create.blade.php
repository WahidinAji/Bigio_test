@extends('layouts.main')
@section('title','Dashboard Surveyor')
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
                    <li class="nav-item {{ Request::url() == url('surveyor-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" aria-current="page"
                            href="{{ URL::route('surveyor.dashboard') }}">Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('logout') }}">
                            <span>Logout</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <p class="nav-item">Name : {{ Auth::guard('surveyor')->user()->name }}</p>
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
@section('text-header','Tambah data Komoditas')
@section('card-body')
<div class="col align-self-start">
    <a class="btn btn-primary" href="{{ URL::route('surveyor.dashboard') }}"
        role="button">Back</a>
</div>
<form action="{{ URL::route('komoditas.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
            aria-describedby="emailHelp" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <div type="button" class="close" data-dismiss="alert">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                    </svg>
                </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="jenis" class="form-label @error('jenis') is-invalid @enderror">Jenis</label>
        <input type="text" class="form-control" id="jenis" aria-describedby="emailHelp" name="jenis"
            value="{{ old('jenis') }}">
        @error('jenis')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <div type="button" class="close" data-dismiss="alert">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                    </svg>
                </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label @error('harga') is-invalid @enderror">Harga</label>
        <input type="text" class="form-control" id="harga" aria-describedby="emailHelp" name="harga"
            value="{{ old('harga') }}">
        @error('harga')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <div type="button" class="close" data-dismiss="alert">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                    </svg>
                </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="img" class=" form-control-label">Gambar Barang</label>
        <div>
            <input type="file" id="img" name="img"
                class="form-control-file border rounded @error('img') is-invalid @enderror">
            @error('img')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <div type="button" class="close" data-dismiss="alert">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                        </svg>
                    </div>
            @enderror
        </div>
    </div>
    <div class="mb-2 mt-2">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
@endsection
