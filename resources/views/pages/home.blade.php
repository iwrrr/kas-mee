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
  <div class="row">
    <div class="col-lg-6 col-md-6 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>User</h4>
          <div class="card-header-action">
            <a href="{{ route('user.index') }}" class="btn btn-primary">Lihat Semua</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No. Telepon</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" align="center">Tidak ada data</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Kas</h4>
          <div class="card-header-action">
            <a href="{{ route('kas.index') }}" class="btn btn-primary">Lihat Semua</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Kas</th>
                  <th>User</th>
                  <th>Target</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cash as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->target }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" align="center">Tidak ada data</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Transaksi</h4>
          <div class="card-header-action">
            <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Lihat Semua</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Kas</th>
                  <th>Pemasukan</th>
                  <th>Pengeluaran</th>
                  <th>Keuntungan</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($transactions as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kas->nama }}</td>
                    <td>{{ $item->pemasukan }}</td>
                    <td>{{ $item->pengeluaran }}</td>
                    <td>{{ $item->keuntungan }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" align="center">Tidak ada data</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection