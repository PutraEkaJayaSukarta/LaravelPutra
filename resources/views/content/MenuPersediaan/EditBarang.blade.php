@inject('SystemUser', 'App\Http\Controllers\SystemUserController')

@extends('adminlte::page')

@section('title', 'KAROTA KING')

@section('content_header')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('stok')}}">Menu Stock Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Stock Barang</li>
    </ol>
</nav>


@stop

@section('content')

<h3 class="page-title">
    <b>Edit Stock Barang</b> <small> Daftar Barang </small>
</h3>
<br />


<div id="accordion">
    @csrf
    <div class="card border border-dark">
        <div class="card-header bg-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h5 class="mb-0">
                Edit Stock
            </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <h2>Edit Post</h2>
                <form action="{{ route('posts-update', $barangs->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_gudang">Nama Gudang:</label>
                        <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" value="{{ $barangs->nama_gudang }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori:</label>
                        <select class="form-control" id="kategori" name="kategori_barang" required>
                            <option value="padat" {{ $barangs->kategori_barang === 'padat' ? 'selected' : '' }}>Padat</option>
                            <option value="gas" {{ $barangs->kategori_barang === 'gas' ? 'selected' : '' }}>Gas</option>
                            <option value="cair" {{ $barangs->kategori_barang === 'cair' ? 'selected' : '' }}>Cair</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang:</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barangs->nama_barang }}" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan_barang">Satuan Barang:</label>
                        <input type="text" class="form-control" id="satuan_barang" name="satuan_barang" value="{{ $barangs->satuan_barang }}" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="harga_jual">Harga Jual:</label>
                        Rp.<input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ $barangs->harga_jual }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli:</label>
                        Rp.<input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ $barangs->harga_beli }}" required>
                    </div> -->
                    <div class="form-group">
                        <label for="tanggal">Tanggal Stock:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal_stock" value="{{ $barangs->tanggal_stock }}" required>
                    </div>
                    <div class="d-flex">
                        <a href="{{route('stok')}}" class="btn btn-danger ml-auto">Batal</a>
                        <button type="submit" class="btn btn-primary ml-2">Update</button>
                    </div>
                </form>
            </div>


        </div>




    </div>
</div>
</form>
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