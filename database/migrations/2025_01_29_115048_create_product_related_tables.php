<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('filename');
            $table->timestamps();
        });

        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('size')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
        });

        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('product_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->decimal('rate', 5, 2);
            $table->timestamps();
        });

      
    }

    public function down()
    {
        Schema::dropIfExists('product_taxes');
        Schema::dropIfExists('product_specifications');
        Schema::dropIfExists('product_colors');
        Schema::dropIfExists('product_images');
    }
};
