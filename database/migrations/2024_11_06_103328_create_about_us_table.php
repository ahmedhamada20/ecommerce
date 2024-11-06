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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('photo',350); 
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('photo_1',350); 
            $table->text('description_ar_1')->nullable();
            $table->text('description_en_1')->nullable();

            $table->string('logo_1')->nullable();
            $table->string('description_logo_1_ar')->nullable();
            $table->string('description_logo_1_en')->nullable();
     
            $table->string('logo_2')->nullable();
            $table->string('description_logo_2_ar')->nullable();
            $table->string('description_logo_2_en')->nullable();

            $table->string('logo_3')->nullable();
            $table->string('description_logo_3_ar')->nullable();
            $table->string('description_logo_3_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
