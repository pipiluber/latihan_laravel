@extends('backend.v_layouts.app')
@section('content')
<!-- < content awal> -->

<div class="row">
    <div class="col-12">
        <a href="{{ route('backend.produk.create') }}"
            <button type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Product
            </button>
        </a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title'>{{$judul}}</h4>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->kategori->nama_kategori }}</td>
                                <td>
                                    @if ($row->status == 1)
                                    <span class="badge badge-success">Publish</span>
                                    @elseif ($row->status == 0)
                                    <span class="badge badge-secondary">Block</span>
                                    @endif
                                </td>
                                <td>{{ $row->nama_produk }}</td>
                                <td>{{ number_format($row->harga, 0, ',', '.') }}</td>

                                <td>{{ $row->stok }}</td>
                                </td>
                                <a href="{{ route('backend.produk.edit', $row->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit

                                    <button type="submit" class="btn btn-cyan btn-sm"><i class="far fa-edit"></i></button>
                                    <!-- Action buttons (edit, delete) can be added here -->
                                </a>
                                <form method="post" action="{{ route('backend.produk.destroy', $row->id) }}" style="display:inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm show_confrim" data-konf-delete="{{$row->nama}}" title="Delete data">delete</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- < content akhir> -->
@endsection