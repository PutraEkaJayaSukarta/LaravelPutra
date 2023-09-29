<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchasePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_payment', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('nama_gudang');
            $table->string('metode_pembayaran');
            $table->timestamps('tanggal_pembelian');
            $table->string('keterangan');
            $table->string('nama_barang');
            $table->string('biaya_sblm_ppn');
            $table->string('jumlah');
            $table->string('sub_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_payment');
    }
}
