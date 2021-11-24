@extends('layouts.main')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="bi-person-fill"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total User</h4>
          </div>
          <div class="card-body">
            {{ $user }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-info">
          <i class="bi-journals"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Kas</h4>
          </div>
          <div class="card-body">
            {{ $kas }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="bi-currency-dollar"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Transaksi</h4>
          </div>
          <div class="card-body">
            {{ $transaksi }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection