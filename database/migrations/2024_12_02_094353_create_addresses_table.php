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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('address')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('building_number')->nullable();
            $table->string('floor')->nullable();
            $table->string('street')->nullable();
            $table->string('landmark')->nullable();
            $table->enum('type',['essential','sub'])->nullable();
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
        Schema::dropIfExists('addresses');
    }
};
