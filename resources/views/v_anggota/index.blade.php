<h3>{{ $judul }}</h3>
<a href="{{route('anggota.create')}}">
    <button type="button">Tambah</button>
</a>

    <table border="1" width="50%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Hp</th>
            <th>Aksi</th>
        </tr>
        @foreach ($index as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->hp }}</td>
            <td>
                <a href="{{ route('anggota.edit', $row->id) }}">
                    <button type="button">Ubah</button>
                </a>
                <form action="{{ route('anggota.destroy', $row->id) }}" method="POST" >
                    @method('DELETE')
                    @csrf
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
