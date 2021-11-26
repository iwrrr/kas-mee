<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Kas.mee</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
</head>

<body>
  
  <div id="app">

    <div class="main-wrapper">

      <div class="row justify-content-center">
        <div class="col-md-3">
          <img src="{{ asset('assets/img/logo-with-text.svg') }}" alt="" class="img-fluid">
        </div>
      </div>

      <div class="row justify-content-center mt-2">
        <div class="col-lg-2 col-md-2 col-sm-3 col-2">
          <a href="{{ route('login') }}" class="btn btn-success btn-lg btn-block">Login</a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-2">
          <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg btn-block">Register</a>
        </div>
      </div>
      
    </div>

  </div>

  @include('includes.script')

</body>
</html>
