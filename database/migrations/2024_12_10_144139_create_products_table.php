<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug_ar')->unique();
            $table->string('slug_en')->unique();
            $table->string('SKU')->unique();
            $table->decimal('product_points', 10, 2)->nullable();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type_discount', ['percentage', 'cash'])->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('quantity')->default(0);
    
            // Add these lines:
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
    
            $table->longText('short_description_ar')->nullable();
            $table->longText('short_description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('notes_ar')->nullable();
            $table->longText('notes_en')->nullable();
            $table->boolean('stock')->default(true);
            $table->boolean('publish')->default(true);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('currency_id')->nullable()->constrained('currencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('features')->nullable();
            $table->json('tags')->nullable();
            $table->date('start_date_discount')->nullable();
            $table->date('end_date_discount')->nullable();
            $table->dateTime('end_time_date_discount')->nullable();
            $table->boolean('news')->default(false)->comment('New product flag');
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
        Schema::dropIfExists('products');
    }
};
