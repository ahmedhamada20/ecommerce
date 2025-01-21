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
            $table->string('slug_ar');
            $table->string('slug_en');
            $table->string('SKU');
            $table->decimal('product_points', 10, 2)->nullable();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type_discount', ['percentage', 'cash'])->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->longText('short_description_ar')->nullable();
            $table->longText('short_description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('notes_ar')->nullable();
            $table->longText('notes_en')->nullable();
            $table->boolean('stock')->nullable();
            $table->boolean('publish')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('currency_id')->constrained('currencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('features')->nullable();
            $table->json('tags')->nullable();
            $table->date('start_date_discount')->nullable();
            $table->date('end_date_discount')->nullable();
            $table->date('end_time_date_discount')->nullable();
            $table->boolean('news')->nullable()->comment('جديد او لاء');
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
