<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('location_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->string('platform_name', 20)->nullable();
            $table->integer('value');
            $table->enum('operation_type', ['add', 'subtract']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('location_transactions');
    }
};
