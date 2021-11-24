<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  @include('includes.style')
</head>

<body>
  <div id="app">

    <div class="main-wrapper">

      <div class="navbar-bg"></div>

      @include('includes.navbar')

      @include('includes.sidebar')

      
      <div class="main-content">
        @yield('content')
      </div>

      @include('includes.footer')

    </div>

  </div>

  @include('includes.script')

</body>
</html>
