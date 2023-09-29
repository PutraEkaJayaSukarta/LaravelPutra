@inject('SystemUser', 'App\Http\Controllers\SystemUserController')

@extends('adminlte::page')

@section('title', 'KAROTA KING')

@section('content_header')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pembelian Barang</li>
    </ol>
</nav>


@stop

@section('content')

<h3 class="page-title">
    <b>From Tambah Pembelian</b>
</h3>
<br />


<div id="accordion">
    @csrf
</div>
<div class="card border border-dark">
    <div class="card-header bg-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h5 class="mb-0">
            Pembelian
        </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <form method="post" action="{{route('upload-penjualan')}}">
                @csrf
                <div>
                    <div class="d-flex justify-content-between">
                        <div class="flex-fill mr-2">
                            <p>Nama Supplier</p>
                            <select class="form-control mr-4" name="nama_supplier" id="" required>
                                @foreach($data as $a)
                                <option value="{{$a->supplier_name}}">{{$a->supplier_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-fill">
                            <p>Nama gudang</p>
                            <select class="form-control mr-4" name="nama_gudang" id="" required>
                                @foreach($barangs as $b)
                                <option value="{{$b->nama_gudang}}">{{$b->nama_gudang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-fill ml-2">
                            <p>Metode Pembayaran</p>
                            <select class="form-control mr-4" name="metode_pembayaran" id="kategori" required>
                                <option value="tes">tes</option>
                                <option value="tes1">tes1</option>
                                <option value="tes2">tes2</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-block mt-4 mb-4">
                        <p>Tanggal Pembelian</p>
                        <input type="date" id="tanggal" class="form-control custom-input-width" name="tanggal_pembelian" required />
                    </div>
                    <div class="d-block mb-4">
                        <p>Keterangan</p>
                        <input type="text" class="form-control mb-1 custom-input-text" placeholder="..." name="keterangan" required />
                    </div>
                </div>
                <p class="h4">Data Pembelian Barang</p>
                <div class="d-flex p-3 justify-content-between">
                    <div class="flex-fill mr-3">
                        <div class="d-flex mb-3 justify-content-between">
                            <div class="mr-3 flex-fill">
                                <label for="kategori">Nama Barang</label>
                                <select class="form-control" name="nama_barang" id="kategori" required>
                                    @foreach ($barangs as $c)
                                    <option value="{{$c->nama_barang}}">{{$c->nama_barang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="reset" class="btn btn-success align-self-end" onclick="redirectToTambahStok()">Barang baru</button>
                            <script>
                                function redirectToTambahStok() {
                                    window.location.href = "{{ route('tambah-stok') }}";
                                }
                            </script>
                        </div>
                        <div>
                            <label for="nama_barang">Biaya Satuan sebelum ppn</label>
                            <input type="text" class="form-control border_bottom" id="data-price" placeholder="..." name="biaya_sblm_ppn" required />
                        </div>
                    </div>
                    <div class="flex-fill">
                        <div class=" mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control border_bottom">
                        </div>
                        <div>
                            <label for="sub_total">Sub Total</label>
                            <div class="d-flex">
                                <p> Rp. </p>
                                <p id="totalSemuaBarang"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <button type="reset" class="btn btn-danger ml-auto">Reset</button>
                    <button class="btn btn-primary ml-2">Selesai</button>
                </div>
            </form>
        </div>

    </div>

</div>
<div class="card border border-dark">
    <div class="card-header bg-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h5 class="mb-0">
            Hasil Pembelian
        </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">

            <table id="example" class="table table-striped table-bordered table-hover table-full-width">
                <thead>
                    <tr>
                        <th width="5%" style="text-align:center">No</th>
                        <th width="15%" style="text-align:center">Nama Supplier</th>
                        <th width="10%" style="text-align:center">Metode Pembayaran</th>
                        <th width="10%" style="text-align:center">Tanggal Pembelian</th>
                        <th width="5%" style="text-align:center">Keterangan</th>
                        <th width="10%" style="text-align:center">Nama Barang</th>
                        <th width="10%" style="text-align:center">Biaya Sebelum PPN</th>
                        <th width="10%" style="text-align:center">Jumlah</th>
                        <th width="10%" style="text-align:center">Sub Total</th>
                        <th width="10%" style="text-align:center">Harga Rata-Rata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pem as $product)
                    <tr>
                        <td class="text-align:center">{{ $product->id }}</td>
                        <td class="text-align:center">{{ $product->nama_supplier }}</td>
                        <td class="text-align:center">{{ $product->metode_pembayaran }}</td>
                        <td class="text-align:center">{{ $product->tanggal_pembelian }}</td>
                        <td class="text-align:center">{{ $product->keterangan }}</td>
                        <td class="text-align:center">{{ $product->nama_barang }}</td>
                        <td class="text-align:center">Rp.{{ number_format($product->biaya_sblm_ppn, 0, ',', '.') }}</td>
                        <td class="text-align:center">{{ $product->jumlah }}</td>
                        <td class="text-align:center">Rp.{{ number_format($product->sub_total, 0, ',','.' ) }}</td>
                        @foreach($rataRataHarga as $barang)
                        @if($barang->nama_barang == $product->nama_barang)
                        <td class="text-align:center">
                            Rp. {{ number_format($barang->rata_rata_harga, 0, ',', '.') }}
                        </td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>


            </table>
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
<style>
    .custom-input-width {
        width: 31.7%;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .custom-input-text {
        width: 70%;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .border_bottom {
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .border_bottom-sub {
        border: 2px dotted;
        border-top: none;
        border-left: none;
        border-right: none;

    }
</style>
@stop

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const biayaInput = document.getElementById('data-price');
        const jumlahInput = document.getElementById('jumlah');
        const totalSemuaBarangElement = document.getElementById('totalSemuaBarang');

        biayaInput.addEventListener('input', updateSubtotal);

        jumlahInput.addEventListener('input', updateSubtotal);

        function updateSubtotal() {
            const biayaSatuan = parseFloat(biayaInput.value) || 0;
            const jumlah = parseFloat(jumlahInput.value) || 0;
            const subTotal = biayaSatuan * jumlah;

            totalSemuaBarangElement.textContent = subTotal.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    });
    const tanggalInput = document.getElementById('tanggal');
    function isiOtomatisTanggal() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;
        tanggalInput.value = formattedDate;
    }
    isiOtomatisTanggal();
</script>


@stop