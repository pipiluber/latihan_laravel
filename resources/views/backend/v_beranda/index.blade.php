@extends('backend.v_layouts.app')
@section('content')
<h3>{{$title}}</h3>
<p>
    Selamat datang ,<b>{{ Auth::user()->name }}</b> pada aplikasi toko online dgn hak akses
    <b>
        @if (Auth::user()->role == 1)
        superadmin
        @elseif (Auth::user()->role == 0)
        admin
        @endif
    </b>
    ini adalah halaman beranda untuk anggota. Pada halaman ini, Anda dapat melihat informasi terbaru tentang produk, penawaran khusus, dan berita terkait toko online kami. Jangan ragu untuk menjelajahi berbagai fitur yang tersedia dan menikmati pengalaman berbelanja yang menyenangkan!
</p>

@endsection