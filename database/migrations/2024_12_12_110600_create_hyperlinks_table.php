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
        Schema::create('hyperlinks', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('Slider , Blog');
            $table->morphs('hypertoable');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('link');
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
        Schema::dropIfExists('hyperlinks');
    }
};
