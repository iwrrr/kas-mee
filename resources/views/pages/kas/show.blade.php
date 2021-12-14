@extends('layouts.main')

@section('title')
Kas
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Kas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('kas.index') }}">Manajemen Kas</a></div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Daftar Kas</h2>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Detail Kas</h4>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="col-md-2">
                <Label>Nama Kas</Label>
              </div>
              <div class="col-md-10">
                : {{ $kas->nama }}
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-2">
                <Label>User</Label>
              </div>
              <div class="col-md-10">
                : {{ $kas->user->name }}
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-2">
                <Label>Target</Label>
              </div>
              <div class="col-md-10">
                : {{ $kas->target }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection