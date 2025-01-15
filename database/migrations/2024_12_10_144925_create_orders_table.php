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
            $table->id();
            $table->string('order_number')->unique()->nullable();
            $table->string('ref_id')->nullable();
            $table->enum('order_type', allowed: array('orders', 'gifit'));
            $table->enum('payment_type', array('cash', 'online', 'installment','wallet'));
            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('points_used')->nullable();
            $table->enum('status',['pending','processing','completed','cancelled','refunded'])->default('pending');
            $table->decimal('subtotal',10,2)->default(0.00);
            $table->decimal('discount',10,2)->default(0.00);
            $table->decimal('total',10,2)->default(0.00);
            $table->text('shipping_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->timestamp('placed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
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
