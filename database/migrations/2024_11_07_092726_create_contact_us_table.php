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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('name',300)->nullable();
            $table->string('email',300)->nullable();
            $table->string('phone',300)->nullable();
            $table->string('messages',300)->nullable();
            $table->string('subject',300)->nullable();
            $table->string('type',300)->nullable();
            $table->string('columns_1',300)->nullable();
            $table->string('columns_2',300)->nullable();
            $table->string('columns_3',300)->nullable();
            $table->string('columns_4',300)->nullable();
            $table->string('columns_5',300)->nullable();
            $table->string('columns_6',300)->nullable();
            $table->string('columns_7',300)->nullable();
            $table->string('columns_8',300)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
