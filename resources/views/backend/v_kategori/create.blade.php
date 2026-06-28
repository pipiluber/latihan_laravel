@extends('backend.v_layouts.app')
@section('content')
<!-- < content awal> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('backend.kategori.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">{{ $judul }}</h4>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Enter category name">
                            @error('nama_kategori')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('backend.kategori.index') }}">
                                <button type="button" class="btn btn-secondary">Return</button>
                            </a>
                        </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- < content akhir> -->
@endsection