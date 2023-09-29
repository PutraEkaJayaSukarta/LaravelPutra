<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $table = 'purchase_payment';

    protected $fillable = [
        'nama_supplier',
        'nama_gudang',
        'metode_pembayaran',
        'tanggal_pembelian',
        'keterangan',
        'nama_barang',
        'biaya_sblm_ppn',
        'jumlah',
        'sub_total',
    ];
    public $timestamps = false;
    

}
