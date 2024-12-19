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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->string('rate')->nullable();
            $table->longText('short_description_ar')->nullable();
            $table->longText('short_description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('notes_ar')->nullable();
            $table->longText('notes_en')->nullable();
            $table->tinyInteger('count_view')->nullable();
            $table->tinyInteger('count_comments')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('blogs');
    }
};
