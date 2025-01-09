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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique(); 
            $table->string('nama');
            $table->string('email');
            $table->date('tanggal');
            $table->unsignedInteger('jumlah_anggota'); 
            $table->string('destinasi');
            $table->decimal('total_harga', 12, 2); 
            $table->string('status'); 
            $table->timestamps();

            
            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
