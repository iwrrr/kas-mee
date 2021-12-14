@extends('layouts.main')

@section('title')
Dashboard | Kas
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Kas</h1>
  </div>
  <div class="section-body">
    <h2 class="section-title">Daftar Kas</h2>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Manajemen Kas</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-md">
                <thead>
                  <th>#</th>
                  <th>Nama Kas</th>
                  <th>User</th>
                  <th>Target</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @forelse ($kas as $item)
                    <tr>
                      <td>{{ $loop->iteration + $kas->firstItem() - 1 }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->user->name }}</td>
                      <td>{{ $item->target }}</td>
                      <td>
                        <a class="btn btn-info btn-action" href="{{ route('kas.show', $item->id)}}"><i class="far fa-eye"></i></a>
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
            {{ $kas->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection