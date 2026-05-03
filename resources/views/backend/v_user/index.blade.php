@extends('backend.v_layouts.app')
@section('content')
<!-- contentawal -->
<h3></h3>
<button type="button" class="btn btn-outline-primary">Tambah</button>
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body border-top">
                <h5 class="card-title">{{$judul}}</h5>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Selamat Datang {{Auth::user()->name}}</h4>
                    <table id="zero_config" class="table table-striped table-bordered">
                        Aplikasi toko online dnegan hak akses yang anda miliki sebagai
                        <b>
                            @if(Auth::user()->role == 1)
                            Super Admin
                            @elseif(Auth::user()->role == 0)
                            Admin
                            @endif
                        </b>
                        ini adalah halmana utama dari aplikasi web programing. studi kasus toko online
                        <hr>

                        <p class="mb-0">sekolah</p>

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($index as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->name }}</td>

                                <td>
                                    @if($row->role == '1')
                                    <span class="badge badge-success"></i>Super Admin</span>
                                    @elseif($row->role == '0')
                                    <span class="badge badge-info">User</i>Admin</span>
                                    @endif
                                </td>
                                <td>
                                    @if($row->status == 1)
                                    <span class="badge badge-success"></i>Aktif</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Aktif</i></span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('anggota.edit', $row->id) }}">
                                        <button type="button" class="btn btn-outline-warning">Ubah</button>
                                    </a>
                                    <form action="{{ route('anggota.destroy', $row->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>

                                <th>No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- contentakhir -->
@endsection