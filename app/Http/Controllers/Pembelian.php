<?php

namespace App\Http\Controllers;

use App\Models\CoreSupplier;
use App\Models\payment;
use App\Models\StockBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pembelian extends Controller
{
    public function index()
    {
        $pem = Payment::all();
        $data = CoreSupplier::all();

        $rataRataHarga = DB::table('purchase_payment')
            ->select('nama_barang', DB::raw('ROUND(AVG(biaya_sblm_ppn), 0) as rata_rata_harga'))
            ->groupBy('nama_barang')
            ->get();

        $barangs = StockBarang::all();


        return view('content.Pembelian.IndexPembelian', compact('data', 'pem', 'rataRataHarga', 'barangs'));
    }


    public function store(Request $req)
    {
        $in = $req->all();

        $harga = $req->input('biaya_sblm_ppn');
        $jumlah = $req->input('jumlah');
        $subTotal = $harga * $jumlah;


        Payment::create([
            'nama_supplier' => $in['nama_supplier'],
            'nama_gudang' => $in['nama_gudang'],
            'metode_pembayaran' => $in['metode_pembayaran'],
            'tanggal_pembelian' => $req->input('tanggal_pembelian'),
            'keterangan' => $in['keterangan'],
            'nama_barang' => $in['nama_barang'],
            'biaya_sblm_ppn' => $in['biaya_sblm_ppn'],
            'jumlah' => $in['jumlah'],
            'sub_total' => $subTotal,
        ]);


        return redirect()->route('index-pembelian')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
