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
        Schema::create('s_e_o_metadata', function (Blueprint $table) {
            $table->id();
            $table->morphs('entitytypeable');
            $table->string('meta_title_ar')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->json('meta_keywords_ar')->nullable();
            $table->json('meta_keywords_en')->nullable();
            $table->string('canonical_url_ar')->nullable();
            $table->string('canonical_url_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_e_o_metadata');
    }
};
