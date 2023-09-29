@inject('SystemUser', 'App\Http\Controllers\SystemUserController')

@extends('adminlte::page')

@section('title', 'KAROTA KING')

@section('content_header')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('stok')}}">Menu Stock Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Stock Barang</li>
    </ol>
</nav>


@stop

@section('content')

<h3 class="page-title">
    <b>Menu Stock Barang</b> <small> Daftar Barang </small>
</h3>
<br />


<div id="accordion">
    @csrf
    <div class="card border border-dark">
        <div class="card-header bg-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h5 class="mb-0">
                Tambah Stock
            </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <form method="post" action="{{route('simpansantri')}}">
                    @csrf
                    <div>
                        <input type="text" class="form-control mb-1" placeholder="Nama Gudang" name="nama_gudang" required />
                        <input type="text" class="form-control mb-1" placeholder="Nama Barang" name="nama_barang" required />
                        <input type="text" class="form-control mb-1" placeholder="satuan barang" name="satuan_barang" required />
                        <!-- <input type="text" class="form-control mb-1" placeholder="Harga Beli Rp. (number only)" name="harga_beli" required />
                        <input type="text" class="form-control mb-1" placeholder="Harga jual Rp. (number only)" name="harga_jual" required /> -->
                        <div class="form-inline d-flex">

                            <label for="kategori" class="d-block mr-2">Kategori:</label>
                            <select class="form-control mr-4" name="kategori_barang" id="kategori" required>
                                <option value="padat">padat</option>
                                <option value="gas">gas</option>
                                <option value="cair">cair</option>
                            </select>

                            <label class="mr-2" for="tanggal">Tanggal Stock:</label>
                            <input type="date" id="tanggal" class="form-control" name="tanggal_stock" required />
                        </div>

                    </div>
                    <div class="d-flex ">
                        <button type="reset" class="btn btn-danger ml-auto">Reset</button>
                        <button class="btn btn-primary ml-2 mt-0">Selesai</button>
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