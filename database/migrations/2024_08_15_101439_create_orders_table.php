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
        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('ref_id')->nullable();
            $table->enum('order_type', array('orders', 'gifit'));
            $table->enum('payment_type', array('cash', 'online', 'installment','wallet'));
            $table->enum('payment_status', array('Unpaid', 'paid'));
            $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status', array('pending', 'received', 'prepared', 'delivery', 'completed', 'rejected', 'canceled','refund'));
            $table->string('subtotal')->default(0.00);
            $table->string('discount')->default(0.00);
            $table->string('total')->default(0.00);
            $table->json('columns')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
