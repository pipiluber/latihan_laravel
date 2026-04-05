@extends('backend.v_layouts.app')
@section('content')
<!-- contentawal -->
 <h3>{{$judul}}</h3>
 <a href="">
    <button class="button">Tambah</button>
 </a>
 <table border="1" width="80%">
    <tr>
        <th>No</th>
        <th>Email</th>
        <th>Name</th>
        <th>Role</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    @foreach ($index as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->role}}</td>
            <td>{{$row->status}}</td>
            <td>
                <a href="">
                    <button type="button">Edit</button>
                </a>
                <form action="" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- contentakhir -->
        @endsection