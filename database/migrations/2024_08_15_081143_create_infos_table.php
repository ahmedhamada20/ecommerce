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
            $table->string('name')->nullable();
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
            $table->text('home_tilte_logo_new')->nullable();
            $table->text('home_title_products_1')->nullable();
            $table->text('notes_title_products_1')->nullable();
            $table->text('home_title_products_2')->nullable();
            $table->text('notes_title_products_2')->nullable();
            $table->string('partners_logo')->nullable();
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
