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

    <div class="main-wrapper register">

      <div class="navbar-bg"></div>

      <div class="row justify-content-center">

        <div class="col-md-6">
          <div class="card">
            <div class="card-body">

              <div class="row justify-content-center">
                <div class="col-md-4">
                  <img src="{{ asset('assets/img/logo-with-text.svg') }}" alt="" class="img-fluid">
                </div>
              </div>

              <div class="row mt-3">
                <div class="col illustration">
                  <img src="{{ asset('assets/img/login-illustration.svg') }}" alt="" class="img-fluid">
                </div>
                <div class="col">
                  <div class="row">

                    <div class="col-md-12 text-center">
                      <h5>Register</h5>
                    </div>

                    <div class="col-md-12">
                      {!! Form::open(['route' => 'register']) !!}
                      <div class="mt-2">
                        {!! Form::label('name', 'Nama pengguna', ['class' => 'form-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Masukkan nama kamu']) !!}
                        @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mt-3">
                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                        {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : null), 'placeholder' => 'Masukkan email kamu']) !!}
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mt-3">
                        {!! Form::label('password', 'Kata sandi', ['class' => 'form-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : null), 'placeholder' => 'Masukkan kata sandi']) !!}
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mt-3">
                        {!! Form::label('password_confirmation', 'Verifikasi kata sandi', ['class' => 'form-label']) !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : null), 'placeholder' => 'Masukkan ulang kata sandi']) !!}
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mt-4">
                        {!! Form::submit('Register', ['class' => 'btn btn-success btn-custom btn-block']) !!}
                      </div>
                      {!! Form::close() !!}
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
      
    </div>

  </div>

  @include('includes.script')

</body>
</html>
