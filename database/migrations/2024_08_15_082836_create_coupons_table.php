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
            $table->string('code');
            $table->text('description')->nullable();
            $table->text('discount_value')->nullable();
            $table->enum('discount_type',['cash','relative'])->nullable();
            $table->tinyInteger('max_used')->nullable();
            $table->tinyInteger('times_used')->nullable()->comment('عدد العملاء الي بفعل استخدمو الكود');
            $table->boolean('status')->default(true);
            $table->string('start_date');
            $table->string('end_date');
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
