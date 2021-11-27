@extends('layouts.main')

@section('title')
User
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>User</h1>
  </div>
  <div class="section-body">
    <h2 class="section-title">Daftar User</h2>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Manajemen User</h4>
          </div>
          <div class="card-body">
            @include('includes.flash')
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-md">
                <thead>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No. Telepon</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @forelse ($users as $user)
                    <tr>
                      <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone_number }}</td>
                      <td>
                        <a class="btn btn-info btn-action" href="{{ route('user.show', $user->id)}}"><i class="far fa-eye"></i></a>

                        <a class="btn btn-warning btn-action" href="{{ route('user.edit', $user->id)}}"><i class="fas fa-pencil-alt"></i></a>

                        <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-action" data-confirm="Apakah Anda Yakin?|Tindakan ini tidak bisa dibatalkan. Apakah Anda ingin melanjutkan?"><i class="fas fa-trash"></i></a>
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
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection