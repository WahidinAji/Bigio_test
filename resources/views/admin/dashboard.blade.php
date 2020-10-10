@extends('layouts.main')
@section('title','Dashboard Admin')
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
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) ==='main' ? 'active' :null }}"
                            aria-current="page" href="{{ url('main') }}">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) ==='dashboard' ? 'active' :null }}"
                            href="{{ URL::route('dashboard') }}">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('logout') }}"></i>
                            <span>Logout</span></a>
                    </li>
                    {{-- <li class="nav-item">
              <a href="{{ URL::route('logout') }}"><i class="lnr lnr-exit" class="more"></i>
                    <span>Logout</span></a>
                    </li> --}}

                </ul>
                <form class="d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
@section('card-body')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>
@endsection
