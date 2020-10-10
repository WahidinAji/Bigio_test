<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/chrome.png') }}" type="image/png">
    {{-- <link rel="icon" href="{{ asset('img/logoFA.png') }}" type="image/png"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/1407b65bc5.js"></script>
    <style>
      .badge{
      padding: 0;
      margin: 1px;
    }
    i.fa{
      margin: 0;
      font-size: 20px;
      color: #222831;
    }
    i.fa:hover{
      color: aqua;
    }
    i.fa.fa-trash:hover, i.fa.fa-arrow-circle-left:hover{
      color: #f72f46;
    }
    i.fa.fa-table.mr-1{
      color: white;
    }
    i.fa.fa-sign-out{
      color: white;
    }
    /* i.fa.fa-sign-out:hover{
      color: aqua;
    } */
    i.fa.fa.fa-plus-circle, i.fa.fa-arrow-circle-left{
      font-size: 30px;
      margin-top: -30px;
    }
    i.fa.fa-plus-circle:hover{
      color: green;
    }
    /* i.fa.fa-arrow-circle-left{
      font-size: 30px;
      color: black;
    } */
    </style>

    <title>@yield('title')</title>
  </head>
  <body>
    @yield('header')
    <main class="container">
      <div class="card text-center" style="padding-top: 10px">
        <div class="card-header">
          Data Laporan
        </div>
        @yield('card-body')
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>
