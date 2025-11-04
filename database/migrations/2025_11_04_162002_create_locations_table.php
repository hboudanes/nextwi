<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');
            $table->foreignId('operator_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('promotion_id')->nullable()->constrained('promotions')->onDelete('set null');
            $table->foreignId('access_policy_id')->nullable()->constrained('access_policies')->onDelete('set null');
            $table->foreignId('brand_config_id')->nullable()->constrained('brand_configs')->onDelete('set null');
            $table->string('name');
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('log', 11, 8)->nullable();
            $table->string('time_zone')->nullable();
            $table->string('zone_id')->nullable();
            $table->text('post_url')->nullable();
            $table->string('username')->nullable();
            $table->text('password')->nullable();
            $table->string('type')->nullable();
            $table->integer('credit')->default(0);
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
