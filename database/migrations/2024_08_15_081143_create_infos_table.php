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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('phone_4')->nullable();
            $table->text('fb_link')->nullable();
            $table->text('tw_link')->nullable();
            $table->text('in_link')->nullable();
            $table->text('payment_logo')->nullable();
            $table->text('home_open_logo_new')->nullable();
            $table->text('home_tilte_logo_new_ar')->nullable();
            $table->text('home_tilte_logo_new_en')->nullable();
            $table->text('home_title_products_1_ar')->nullable();
            $table->text('home_title_products_1_en')->nullable();
            $table->text('notes_title_products_1_ar')->nullable();
            $table->text('notes_title_products_1_en')->nullable();
            $table->text('home_title_products_2_ar')->nullable();
            $table->text('home_title_products_2_en')->nullable();
            $table->text('notes_title_products_2_ar')->nullable();
            $table->text('notes_title_products_2_en')->nullable();
            $table->string('partners_logo')->nullable();
            $table->string('category_logo')->nullable();
            $table->string('banar_logo')->nullable();
            $table->string('blog_logo')->nullable();


            $table->string('category_logo_title_ar')->nullable();
            $table->string('category_logo_title_en')->nullable();
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
        Schema::dropIfExists('infos');
    }
};
