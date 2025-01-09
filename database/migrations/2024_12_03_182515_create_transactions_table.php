<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();       // Order ID unik
            $table->string('customer_name');           // Nama pelanggan
            $table->decimal('amount', 15, 2);          // Jumlah pembayaran
            $table->string('status');                 // Status pembayaran (pending, success, failed)
            $table->string('payment_type');           // Jenis pembayaran (credit_card, bank_transfer, dll.)
            $table->json('metadata')->nullable();     // Data tambahan (opsional)
            $table->timestamps();                     // Created at & Updated at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
