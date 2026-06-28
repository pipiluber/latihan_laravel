@extends('backend.v_layouts.app')
@section('content')
<!-- < content awal> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $judul }}</h5>
                    <form class="horizontal" action="{{ route('backend.produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">{{ $judul }}</h4>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>FOTO</label>
                                        <input type="file" name="foto" class="form-control @error('foto')is-invalid @enderror">
                                        @error('foto')
                                        <div class="invalid-feedback alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control @error('kategori')is-invalid @enderror" name="kategori_id">
                                            <option value="">Select Category</option>
                                            @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                        <span class="invalid-feedback alert-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for=>Product Name</label>
                                        <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Enter product name">
                                        @error('nama_produk')
                                        <span class="invalid-feedback alert-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Detail</label>
                                        <textarea name="detail" class="form-control @error('detail') is-invalid @enderror" placeholder="Enter product detail">{{ old('detail') }}</textarea>
                                        @error('detail')
                                        <span class="invalid-feedback alert-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" onkeypress="return hanyaangka(event)" name="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid @enderror" placeholder="Enter product price">
                                        @error('harga')
                                        <span class="invalid-feedback alert-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>weight</label>
                                        <input type="text" onkeypress="return hanyaangka(event)" name="berat" class="form-control @error('berat')is invalid @enderror" placeholder="Enter product weight">
                                        @error('berat')
                                        <span class="invalid-feedback alert-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label>stock</label>
                                        <input type="text" onkeypress="return hanyaangka(event)" name="stock" class="form-control @error('stock')is invalid @enderror" placeholder="Enter product stock">
                                        @error('stock')
                                        <span class="invalid-feedback alert-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <a href="{{ route('backend.produk.index') }}" class="btn btn-secondary">Return</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Product</button>
                                    <a href="{{ route('backend.produk.index') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- < content akhir> -->
    @endsection