<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('destination_id');
            $table->string('name');
            $table->string('email');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'paid', 'rejected'])->default('pending'); // Status pesanan
            $table->enum('payment_status', ['pending', 'capture', 'settlement', 'deny', 'expire', 'cancel'])->default('pending'); // Status pembayaran dari Midtrans
            $table->text('payment_status_message')->nullable(); // Pesan status pembayaran
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
