@inject('SystemUser', 'App\Http\Controllers\SystemUserController')

@extends('adminlte::page')

@section('title', 'KAROTA KING')

@section('content_header')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Menu Stock Barang</li>
    </ol>
</nav>

@stop

@section('content')

<h3 class="page-title">
    <b>Menu Stock Barang</b> <small> Daftar Barang </small>
</h3>
<br />

@if(session('msg'))
<div class="alert alert-info" role="alert">
    {{session('msg')}}
</div>
@endif
<div id="accordion">
    @csrf
    <div class="card border border-dark">
        <div class="m-4">
            <div class="card-header bg-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h5 class="mb-0">
                    List Stock Barang
                </h5>
            </div>
            <div id="collapseOne" class="collapse show mt-4" aria-labelledby="headingOne" data-parent="#accordion">

                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <div class="form-row d-block">
                        <div class="d-flex">
                            <div class="form-group  col-md-4 mr-auto">
                                <label for="kategori">Kategori:</label>
                                <select class="form-control " id="kategori" name="kategori">
                                    <option value="">Semua Kategori</option>
                                    <option value="padat">Padat</option>
                                    <option value="gas">Gas</option>
                                    <option value="cair">Cair</option>
                                </select>
                            </div>
                            <div class="form-group  col-md-4 mr-auto ">
                                <label for="tanggal">Tanggal Stock:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 ">
                            <button type="button" class="btn btn-success ml-auto " title="tambah data" onclick="redirectToTambahStok()">Tambah Stock Barang</button>
                            <button type="submit" class="btn btn-primary ml-2">Cari</button>
                            <script>
                                function redirectToTambahStok() {
                                    window.location.href = "{{ route('tambah-stok') }}";
                                }
                            </script>
                        </div>

                    </div>
                </form>
                <hr />

                <div class="card-footer text-muted">

                </div>
                <table id="example" class="table table-striped table-bordered table-hover table-full-width">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align:center">No</th>
                            <th width="15%" style="text-align:center">Nama Gudang</th>
                            <th width="15%" style="text-align:center">Kategori Barang</th>
                            <th width="15%" style="text-align:center">Nama Barang</th>
                            <th width="5%" style="text-align:center">Satuan Barang</th>
                            <!-- <th width="10%" style="text-align:center">Harga Beli</th>
                            <th width="10%" style="text-align:center">Harga Jual</th> -->
                            <th width="10%" style="text-align:center">Tanggal Stock</th>
                            <th width="10%" style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $product)
                        <tr>
                            <td class="text-align:center">{{ $product->id }}</td>
                            <td class="text-align:center">{{ $product->nama_gudang }}</td>
                            <td class="text-align:center">{{ $product->kategori_barang }}</td>
                            <td class="text-align:center">{{ $product->nama_barang }}</td>
                            <td class="text-align:center">{{ $product->satuan_barang }}</td>
                            <!-- <td class="text-align:center">Rp.{{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                            <td class="text-align:center">Rp.{{ number_format($product->harga_jual, 0, ',','.' ) }}</td> -->
                            <td class="text-align:center">{{ $product->tanggal_stock }}</td>
                            <td class="text-center">
                                <div class="d-flex">
                                    <a href="{{ route('posts-edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                    <form action="{{ route('stok-destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>


                <div class="flex float-left items-center h-screen">
                    <div class="text-center">
                        <div>
                        <a href="{{ route('barang.export.excel') }}" class="btn btn-warning w-40 h-12">Export to Excel</a>
                        </div>
                        <div>
                            <a href="{{ route('preview-pdf') }}" class="btn btn-primary w-40 h-12">Export to PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br />
@if(session('msg'))
<div class="alert alert-info" role="alert">
    {{session('msg')}}
</div>
@endif
</div>
</div>

@stop

@section('footer')

@stop

@section('css')

@stop

@section('js')

@stop