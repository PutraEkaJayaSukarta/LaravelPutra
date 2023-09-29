<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockBarang;

class Penjualan extends Controller
{
    public function index(){

        $b = StockBarang::all();

        return view('content.Penjualan.IndexPenjualan',  compact('b'));       
    }
}
