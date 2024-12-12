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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('customer_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger('type_code')->comment('1->free || 2->paid in customer');
            $table->string('code');
            $table->text('description')->nullable();
            $table->decimal('discount_value',10,2)->nullable();
            $table->enum('discount_type',['cash','relative'])->nullable();
            $table->integer('max_used')->nullable();
            $table->integer('times_used')->nullable()->comment('عدد العملاء الي بفعل استخدمو الكود');
            $table->boolean('status')->default(true);
            $table->string('start_date');
            $table->string('end_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
