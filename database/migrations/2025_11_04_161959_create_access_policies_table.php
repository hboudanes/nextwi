<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('access_policies', function (Blueprint $table) {
            $table->id();
            $table->boolean('daily_limit_enabled')->default(false);
            $table->integer('session_limit')->nullable();
            $table->boolean('speed_limit_enabled')->default(false);
            $table->decimal('bandwidth_limit', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_policies');
    }
};
