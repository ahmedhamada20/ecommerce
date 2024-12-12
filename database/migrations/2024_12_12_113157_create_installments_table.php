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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->decimal('deposit',10,2)->nullable();
            $table->decimal('down_payment',10,2)->nullable();
            $table->decimal('profit',10,2)->nullable();
            $table->decimal('min_price',10,2)->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('installments');
    }
};
