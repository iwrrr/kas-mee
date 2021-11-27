@extends('layouts.main')

@section('title')
Transaksi
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Transaksi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('transaksi.index') }}">Manajemen Transaksi</a></div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Daftar Transaksi</h2>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Detail Transaksi</h4>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="col-md-2">
                <Label>Pemasukan</Label>
              </div>
              <div class="col-md-10">
                : {{ $transaksi->pemasukan }}
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-2">
                <Label>Pengeluaran</Label>
              </div>
              <div class="col-md-10">
                : {{ $transaksi->pengeluaran }}
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-2">
                <Label>Keuntungan</Label>
              </div>
              <div class="col-md-10">
                : {{ $transaksi->keuntungan }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection