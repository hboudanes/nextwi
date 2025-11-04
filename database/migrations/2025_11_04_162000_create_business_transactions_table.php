<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('business_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');
            $table->integer('value');
            $table->enum('operation_type', ['add', 'subtract']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_transactions');
    }
};
