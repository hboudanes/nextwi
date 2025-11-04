<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('location_id')->nullable()->constrained('locations')->onDelete('set null');
            $table->string('tag', 32)->nullable();
            $table->string('zone_id', 32)->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('fullname')->nullable();
            $table->string('whatsapp', 50)->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('language', 10)->nullable();
            $table->boolean('email_verified')->default(false);
            $table->boolean('whatsapp_verified')->default(false);
            $table->timestamp('first_seen')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->json('dynamic_field')->nullable();
            $table->boolean('state')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
