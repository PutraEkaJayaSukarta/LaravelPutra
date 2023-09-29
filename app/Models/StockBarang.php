<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockBarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_gudang',
        'kategori_barang',
        'nama_barang',
        'satuan_barang',
        'harga_beli',
        'harga_jual',
        'tanggal_stock',
        
    ];
    public $timestamps = false;
    
}
