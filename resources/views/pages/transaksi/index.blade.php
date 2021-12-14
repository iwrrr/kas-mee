@extends('layouts.main')

@section('title')
Dashboard | Transaksi
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Transaksi</h1>
  </div>
  <div class="section-body">
    <h2 class="section-title">Daftar Transaksi</h2>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Manajemen Transaksi</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-md">
                <thead>
                  <th>#</th>
                  <th>Pemasukan</th>
                  <th>Pengeluaran</th>
                  <th>Keuntungan</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @forelse ($transaksis as $transaksi)
                    <tr>
                      <td>{{ $loop->iteration + $transaksis->firstItem() - 1 }}</td>
                      <td>{{ $transaksi->pemasukan }}</td>
                      <td>{{ $transaksi->pengeluaran }}</td>
                      <td>{{ $transaksi->keuntungan }}</td>
                      <td>
                        <a class="btn btn-info btn-action" href="{{ route('transaksi.show', $transaksi->id)}}"><i class="far fa-eye"></i></a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" align="center">Tidak ada data</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            {{ $transaksis->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection