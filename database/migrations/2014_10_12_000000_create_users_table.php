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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable()->unique();
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('reset_code')->nullable();
            $table->enum('type',['admin','supervisor','employee']);
            $table->enum('status',['active','noActive'])->default('active');
            $table->integer('rate')->default(0);
            $table->text('fb_link')->nullable();
            $table->text('tw_link')->nullable();
            $table->text('in_link')->nullable();
            $table->json('columns')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
