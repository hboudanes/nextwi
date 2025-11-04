<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->string('name');
            $table->string('title')->nullable();
            $table->boolean('open_access')->default(false);
            $table->boolean('vouchers_base')->default(false);
            $table->boolean('password_base')->default(false);
            $table->boolean('firstname_enabled')->default(false);
            $table->boolean('firstname_required')->default(false);
            $table->boolean('lastname_enabled')->default(false);
            $table->boolean('lastname_required')->default(false);
            $table->boolean('gender_enabled')->default(false);
            $table->boolean('gender_required')->default(false);
            $table->boolean('birthday_enabled')->default(false);
            $table->boolean('birthday_required')->default(false);
            $table->boolean('email_enabled')->default(false);
            $table->boolean('email_required')->default(false);
            $table->boolean('mobile_enabled')->default(false);
            $table->boolean('mobile_required')->default(false);
            $table->boolean('email_verification')->default(false);
            $table->boolean('whatsapp_verification')->default(false);
            $table->json('checkboxes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
