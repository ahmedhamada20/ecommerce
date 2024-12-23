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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('code_country')->nullable();
            $table->string('whatsapp_phone')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('in_link')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('reset_code')->nullable();
            $table->decimal('wallets',10,2)->nullable();
            $table->text('address')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->enum('type',['admin','customer'])->default('customer');
            $table->enum('gender',['man','female'])->nullable();
            $table->decimal('wallet_balance',10,2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('reset_password_expires')->nullable();
            $table->string('reset_password_token')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->json('columns')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
