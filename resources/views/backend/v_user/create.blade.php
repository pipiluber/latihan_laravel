@extends('backend.v_layouts.app')
@section('content')
<!-- contentawal -->

<form action="{{ route('backend.user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>foto</label>
    <img class="foto-preview">
    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" onchange="previewFoto()">
    @error('foto')
    <div class="invalid-feedback alert-danger">{{message}}</div>
    @enderror
    <p></p>

    <label>hak akses</label>
    <select name="role" class="form-control @error('role') is-invalid @enderror">
        <option value="{{old('role') =='' ? 'selected': ''}}">Pilih Hak Akses</option>
        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Super Admin</option>
        <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Admin</option>
    </select>
    @error('role')
    <span class="invalid-feedback alert-danger">{{message}}</span>
    @enderror
    <p></p>
    <label>nama</label>
    <input type="text" name="nama" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
    @error('name')
    <span class="invalid-feedback alert-danger">{{message}}</span>
    @enderror
    <p></p>

    <label>email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
    @error('email')
    <span class="invalid-feedback alert-danger">{{message}}</span>
    @enderror
    <p></p>
    <label>Hp</label>
    <input type="text" name="hp" class="form-control @error('hp') is-invalid @enderror" value="{{ old('hp') }}">
    @error('hp')
    <span class="invalid-feedback alert-danger">{{message}}</span>
    @enderror
    <p></p>
    <label>konfirmasi password</label>
    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
    @error('password_confirmation')
    <span class="invalid-feedback alert-danger">{{message}}</span>
    <button type="submit" class="btn btn-primary">simpan</button>
</form>