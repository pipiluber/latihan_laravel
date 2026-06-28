@extends('backend.v_layouts.app')
@section('content')
<!-- < content awal> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('backend.kategori.update', $edit->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">{{$judul}}</h4>

                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="nama_kategori" value="{{ old('nama_kategori', $edit->nama_kategori) }}" placeholder="Enter category name">
                            @error('nama_kategori')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('backend.kategori.index') }}" class="btn btn-secondary">Return</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- < content akhir> -->
@endsection