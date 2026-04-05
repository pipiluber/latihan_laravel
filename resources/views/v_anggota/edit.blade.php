<h3>{{ $judul }}</h3>
<form action="{{ route('anggota.update', $edit->id) }}" method="POST">
    @method('PUT')
    @csrf
    <label>Nama</label><br>
    <input type="text" name="nama" id="nama" value="{{ old('nama', $edit->nama) }}"
        placeholder="masukkan nama lengkap"><br>
    <label>Hp</label><br>
    <input type="text" name="hp" id="hp" value="{{ old('hp', $edit->hp) }}"
        placeholder="Masukkan No Hp"><br><br>
    <button type="submit">Perbarui</button>
    <a href="{{ route('anggota.index') }}">
        <button type="button">Batal</button>