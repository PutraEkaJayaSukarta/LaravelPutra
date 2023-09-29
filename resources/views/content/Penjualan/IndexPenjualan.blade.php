@inject('SystemUser', 'App\Http\Controllers\SystemUserController')

@extends('adminlte::page')

@section('title', 'KAROTA KING')

@section('content_header')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">From Tambah Penjualan</li>
    </ol>
</nav>

@stop

@section('content')

<h3 class="page-title">
    <b>From Tambah Penjualan</b>
</h3>
<br />

@if(session('msg'))
<div class="alert alert-info" role="alert">
    {{session('msg')}}
</div>
@endif
<div id="accordion">
    <div class="container-fluid">
        <div class="row custom-height">
            <div class="col-sm ">
                <div class="card border border-dark p-3 h-100">
                    <div class="form-group d-flex">
                        <label for="tanggal" class="  w-100">Tanggal</label>
                        <input type="date" class="form-control custom-input">
                    </div>
                    <div class="form-group d-flex">
                        <label for="kategori" class="  w-100">Anggota</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option value="">Semua Kategori</option>
                            <option value="">Sputra</option>
                        </select>
                    </div>
                    <div class="form-group d-flex">
                        <label for="metodePembayaran" class=" w-100">Metode Pembayaran</label>
                        <select class="form-control" id="metodePembayaran" name="metodePembayaran">
                            <option value="">Tunai</option>
                            <option value="">Sputrxfyja</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm ">
                <div class="card border border-dark p-3 h-100">
                    <div class="form-group d-flex">
                        <label class="mr-5">Barcode</label>
                        <input type="text" name="" id="" class="form-control custom-input">
                    </div>
                    <div class="form-group mt-auto mb-auto">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card border border-dark p-3 h-100">
                    <p class="font-weight-bold">Total</p>
                    <p class="custom-text ml-auto" id="totalSemuaBarang">Rp 0</p> 
                </div>
            </div>

        </div>
    </div>
    <div class="card border border-dark mt-4 mr-2 ml-2">
        <div class="card-header bg-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h5 class="mb-0">
                Daftar Barang
            </h5>
        </div>
        <div id="collapseOne" class="collapse show m-4" aria-labelledby="headingOne" data-parent="#accordion">
            <table class="table table-striped table-bordered table-hover table-full-width">
                <thead>
                    <tr>
                        <th style="text-align:center">No</th>
                        <th style="text-align:center">Nama Barang</th>
                        <th style="text-align:center">Satuan Barang</th>
                        <th style="text-align:center">Harga Satuan</th>
                        <th width="10%" style="text-align:center">Jumlah barang</th>
                        <th width="15%" style="text-align:center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($b as $pro)
                    <tr>
                        <td class="text-align:center">{{ $pro->id }}</td>
                        <td class="text-align:center">{{ $pro->nama_barang }}</td>
                        <td class="text-align:center">{{ $pro->satuan_barang }}</td>
                        <td class="text-align:center">Rp.{{ number_format($pro->harga_jual, 0, ',','.') }}</td>
                        <td class="text-align:center">
                            <input type="number" id="input_{{ $pro->id }}" class="quantity-input" min="0" max="99" data-price="{{ $pro->harga_jual }}">
                        </td>
                        <td class="text-align:center"><span id="total_{{ $pro->id }}">Rp.0</span></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="card border border-dark mr-2 ml-2 w-50">
        <div class="card-body">
            <div class="mb-3 d-flex">
                <label for="voucher" class="w-100">Voucher</label>
                <select class="form-control" id="voucher">
                    <option value="">tes 1</option>
                    <option value="">tes 2</option>
                </select>
            </div>
            <div class="mb-3 d-flex">
                <label for="noVoucher" class="w-100">No. Voucher</label>
                <input type="text" class="form-control custom-input" id="noVoucher">
            </div>
            <div class="mb-3 d-flex">
                <label for="diskon" class="w-100">Diskon (%)</label>
                <input type="text" class="form-control custom-input" id="diskon">
            </div>
            <div class="mb-3 d-flex">
                <label for="bayar" class="w-100">Bayar</label>
                <input type="text" class="form-control custom-input" id="bayar">
            </div>
            <div class="mb-3 d-flex">
                <label for="kembalian" class="w-100">Kembalian</label>
                <input type="text" class="form-control custom-input" id="kembalian">
            </div>
            <div class="w-100 d-flex justify-content-end">
                <button class="btn btn-danger mr-1">Batal</button>
                <button class="btn btn-success ">Simpan</button>
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
<style>
    .custom-input {
        border: none;
        border-bottom: 1px solid #ced4da;
        padding: 0;
        border-radius: 0;
        background-color: transparent;
        box-shadow: none;
    }

    .custom-height {
        height: 200px;
    }

    .custom-text {
        font-weight: bold;
        font-size: 44px;
        color: red;
    }
    
    
</style>
@stop

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const quantityInputs = document.querySelectorAll(".quantity-input");
        const totalSemuaBarangElement = document.getElementById("totalSemuaBarang");
        let totalSemuaBarang = 0;

        quantityInputs.forEach(function (input) {
            input.addEventListener("input", function () {
                const id = input.id.split("_")[1];
                const price = parseFloat(input.getAttribute("data-price"));
                const quantity = parseInt(input.value);

                const totalElement = document.getElementById("total_" + id);
                const total = price * quantity;
                totalElement.textContent = "Rp " + total.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                totalSemuaBarang = calculateTotalSemuaBarang();
                totalSemuaBarangElement.textContent = "Rp " + totalSemuaBarang.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });
        });

        function calculateTotalSemuaBarang() {
            let total = 0;
            quantityInputs.forEach(function (input) {
                const price = parseFloat(input.getAttribute("data-price"));
                const quantity = parseInt(input.value);
                const totalElement = document.getElementById("total_" + input.id.split("_")[1]);
                
                if (quantity > 0) {
                    total += price * quantity;
                    totalElement.textContent = "Rp " + (price * quantity).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                } else {
                    totalElement.textContent = "Rp 0";
                }
            });
            return total;
        }
    });
</script>


@stop