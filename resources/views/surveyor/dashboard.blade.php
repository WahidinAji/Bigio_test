@extends('layouts.main')
@section('title','Dashboard Surveyor')
@section('header')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
            <li class="nav-item {{ Request::url() == url('surveyor-dashboard') ? 'active' : '' }}">
              <a class="nav-link" aria-current="page" href="{{URL::route('surveyor.dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ URL::route('logout') }}"></i> <span>Logout</span></a>
            </li>
            <li class="nav-item">
                <p class="nav-link">Status : {{ Auth::guard('surveyor')->user()->name }}</p>
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
<div class="col align-self-start">
    <a class="btn btn-primary" href="{{ URL::route('komoditas.create') }}" role="button">Tambah Komoditas</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($komoditas as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->jenis }}</td>
            <td>Rp. {{ $item->harga }} </td>
            <td style="width: 10%;"  >
                <img src="{{ asset('/img/komoditas/'.$item->img) }}" alt="" width="100%">
            </td>
            <td>
                <a href="#" class="badge">
                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                </a>
                <a href="{{ URL::route('komoditas.edit',$item->id) }}" class="badge">
                    <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                </a>
                <form action="{{ URL::route('komoditas.destroy',$item->id) }}" method="POST" class="badge">
                    @method('delete')
                    @csrf
                    <button class="badge badge-outline-danger">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                </form>
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
@push('tooltip')
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
@endpush

