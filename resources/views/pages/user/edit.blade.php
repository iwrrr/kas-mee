@extends('layouts.main')

@section('title')
User
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>User</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('user.index') }}">Manajemen User</a></div>
    </div>
  </div>
  {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT']) !!}
  {!! Form::hidden('id') !!}
  @csrf
  <div class="section-body">
    <h2 class="section-title">Update User</h2>
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            @include('includes.flash')
            <div class="form-group">
              {!! Form::label('name', 'Nama') !!}
              {!! Form::text('name', old('name', !empty($user) ? $user->name : null), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') . (!$errors->has('name') && old('name') ? ' is-valid' : '')]) !!}
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              {!! Form::label('email', 'Email') !!}
              {!! Form::email('email', old('email', !empty($user) ? $user->email : null), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '') . (!$errors->has('email') && old('email') ? ' is-valid' : '')]) !!}
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              {!! Form::label('phone_number', 'No. Telepon') !!}
              {!! Form::text('phone_number', old('phone_number', !empty($user) ? $user->phone_number : null), ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : '') . (!$errors->has('phone_number') && old('phone_number') ? ' is-valid' : '')]) !!}
              @error('phone_number')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              {!! Form::label('password', 'Ubah Kata Sandi') !!}
              {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '') . (!$errors->has('password') && old('password') ? ' is-valid' : '')]) !!}
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              {!! Form::label('password_confirmation', 'Konfirmasi Kata Sandi') !!}
              {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : '') . (!$errors->has('password_confirmation') && old('password_confirmation') ? ' is-valid' : '')]) !!}
              @error('password_confirmation')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-success">Update</button>
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</section>
@endsection