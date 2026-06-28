@extends('backend.v_layouts.app')
@section('content')
<!-- < content awal> -->
<div class="row">
    <div class="col-12">
        <a href="{{ route('backend.kategori.create') }}" class="btn btn-primary mb-3">
            <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i>tambah</button>
        </a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $judul }}</h5>
                <div class="table-responsive">
                    <table id="zero_confing" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($index as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama_kategori }}</td>
                                <td>
                                    <a href="{{ route('backend.kategori.edit', $row->id) }}" title="Edit"
                                    <button type="button" class="btn btn-cyan btn-sm"><i class="fas fa-edit">Edit</i></button>
                                    </a>
                                    <form method="POST" action="{{ route('backend.kategori.destroy', $row->id) }}" 
                                    style="display:inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"><i class="fas fa-trash">delete</i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- < content akhir> -->
@endsection