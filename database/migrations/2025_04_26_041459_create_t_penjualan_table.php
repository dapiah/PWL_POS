<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->integer('jumlah');
            $table->decimal('total_harga',10,2);
            $table->timestamp('tanggal_penjualan')->useCurrent();
            $table->timestamps();

            //foreign key
            $table->foreign('barang_id')->references('id')->on('m_barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan');
    }
};
