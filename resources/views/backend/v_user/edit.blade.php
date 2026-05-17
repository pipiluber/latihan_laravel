@extends('backend.v_layouts.app')
@section('content')
<!-- contentawal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('backend.user.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <h4 class="card-title"> {{$judul}}</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>foto</label>
                                    <!-- viewimage -->
                                    @if($edit->foto)
                                    <img src="{{ asset('storage/img-user/' . $edit->foto) }}" class="foto-preview " width="100%">
                                    <p></p>
                                    @else
                                    <img src="{{ asset('assets/images/no-default.png') }}" class="foto-preview" width="100%">
                                    @endif
                                    <!-- file foto -->
                                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" onchange="previewFoto()">
                                </div>
                                @error('foto')
                                <div class="invalid-feedback alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>hak akses</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="{{old('role') =='' ? 'selected': ''}}">
                                        Pilih Hak Akses</option>
                                    <option value="1" {{ old('role', $edit->role) == '1' ? 'selected' : '' }}>
                                        Super Admin</option>
                                    <option value="0" {{ old('role', $edit->role) == '0' ? 'selected' : '' }}>
                                        Admin</option>
                                </select>
                                @error('role')
                                <span class="invalid-feedback alert-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status', $edit->status) == '1' ? 'selected' : '' }}>
                                        Aktif</option>
                                    <option value="0" {{ old('status', $edit->status) == '0' ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback alert-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" name="name" is-invalid value="{{ old('name', $edit->name) }}" class="form-control @error('name') is-invalid @enderror placeholder=" masukkan nama">
                                @error('name')
                                <span class="invalid-feedback alert-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="text" name="email" value="{{ old('email', $edit->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="masukkan email">
                                @error('email')
                                <span class="invalid-feedback alert-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>hp</label>
                                <input type="text" name="hp" value="{{ old('hp', $edit->hp) }}" class="form-control @error('hp') is-invalid @enderror" placeholder="masukkan nomor hp">
                                @error('hp')
                                <span class="invalid-feedback alert-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            <a href="{{ route('backend.user.index') }}" class="btn btn-outline-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection