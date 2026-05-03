@extends('backend.v_layouts.app')
@section('content')
<!-- contentawal -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('backend.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <h4 class="card-title">{{$judul}}</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>foto</label>
                                    <img class="foto-preview">
                                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" onchange="previewFoto()">
                                    @error('foto')
                                    <div class="invalid-feedback alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>hak akses</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="{{old('role') =='' ? 'selected': ''}}">Pilih Hak Akses</option>
                                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Super Admin</option>
                                        <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback alert-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <p></p>
                                    <label>nama</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback alert-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label>email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback alert-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Hp</label>
                                    <input type="text" name="hp" class="form-control @error('hp') is-invalid @enderror" value="{{ old('hp') }}">
                                    @error('hp')
                                    <span class="invalid-feedback alert-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-goup">
                                    <label>password</label>
                                    <input type="password" name="password" class="form-control @error('password') is invalid @enderror" placeholder="masukkan password">
                                    @error('password')
                                    <span class="indvalid-feedback-alert-danger" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>konfirmasi password</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback alert-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">simpan</button>
                </form>
                @endsection